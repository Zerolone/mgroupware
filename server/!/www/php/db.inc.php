<?php
	require_once("properties.inc.php");
	require_once("tools.inc.php");

	if (DEMO_MODE) {

		terminateWithError(501, "No database are available.");

	}


	$linkDb = mysql_connect(DB_HOST, DB_USER, DB_PASS) or terminateWithError(500, "Can't connect to '" . DB_USER . "@". DB_HOST."'");

	mysql_select_db(DB_NAME) or terminateWithError(500, "Can't select database '".DB_NAME."'");

	/**
 	 * Save values in database.
	 */
	function save($workspace, $selectedCategory, $list1, $list2, $list3, $list4) {

		if ( empty($workspace) || empty($selectedCategory)  ) {

			terminateWithError(500, "Parameter workspace and selectedCategory expected !");

		}

		$workspace = prepSqlValue($workspace);
		$selectedCategory = prepSqlValue($selectedCategory);
		$list1 = prepSqlValue($list1);
		$list2 = prepSqlValue($list2);
		$list3 = prepSqlValue($list3);
		$list4 = prepSqlValue($list4);

		/*
		 * Workspace
		 */
		$searchSql = "SELECT * FROM workspaces WHERE workspace = $workspace";
		$searchResult = mysql_query($searchSql) or terminateWithError(500, "Error in SQL : " . $searchSql);

		if ($searchResult && mysql_num_rows($searchResult) == 1) {

			$sqlWorkspace = "UPDATE `workspaces` SET selectedCategory = $selectedCategory WHERE workspace = $workspace";
			$sqlList1 = "UPDATE `lists` SET content = $list1 WHERE workspace = $workspace AND id = 0";
			$sqlList2 = "UPDATE `lists` SET content = $list2 WHERE workspace = $workspace AND id = 1";
			$sqlList3 = "UPDATE `lists` SET content = $list3 WHERE workspace = $workspace AND id = 2";
			$sqlList4 = "UPDATE `lists` SET content = $list4 WHERE workspace = $workspace AND id = 3";

		} else if ($searchResult && mysql_num_rows($searchResult) > 1) {

			terminateWithError(500, "More than 1 row exists in database with that workspace name ! Some data may be corrupted !");

		} else {

			$sqlWorkspace = "INSERT INTO `workspaces` (workspace, selectedCategory) VALUES ($workspace, $selectedCategory)";
			$sqlList1 = "INSERT INTO `lists` (workspace, id, content) VALUES($workspace, 0, $list1)";
			$sqlList2 = "INSERT INTO `lists` (workspace, id, content) VALUES($workspace, 1, $list2)";
			$sqlList3 = "INSERT INTO `lists` (workspace, id, content) VALUES($workspace, 2, $list3)";
			$sqlList4 = "INSERT INTO `lists` (workspace, id, content) VALUES($workspace, 3, $list4)";

		}

		mysql_free_result($searchResult);
		mysql_query($sqlWorkspace) or terminateWithError(500, "Error in SQL : " . $sqlWorkspace);
		mysql_query($sqlList1) or terminateWithError(500, "Error in SQL : " . $sqlList1);
		mysql_query($sqlList2) or terminateWithError(500, "Error in SQL : " . $sqlList2);
		mysql_query($sqlList3) or terminateWithError(500, "Error in SQL : " . $sqlList3);
		mysql_query($sqlList4) or terminateWithError(500, "Error in SQL : " . $sqlList4);
		mysql_close($linkDb);
	}

	/*
	 * 
	 */	
	function getWorkspace($workspace) {

		if ( empty($workspace)  ) {

			terminateWithError(404, "Parameter workspace expected !");

		}

		$workspace = prepSqlValue($workspace);
		$lists = array();

		$searchSql = "SELECT * FROM workspaces WHERE workspace = $workspace";
		$searchResult = mysql_query($searchSql) or terminateWithError(500, "Error in SQL : " . $searchSql);

		if ($searchResult && mysql_num_rows($searchResult) == 1) {
			if ($line = mysql_fetch_assoc($searchResult)) {

				$selectedCategory = prepJSONValue($line['selectedCategory']);

				{
					$listSql = "SELECT * FROM lists WHERE workspace = $workspace ORDER BY id";
					$listResult = mysql_query($listSql) or terminateWithError(500, "Error in SQL : " . $listSql);

					if ($listResult && mysql_num_rows($listResult) == 4) {
						while ($lineList = mysql_fetch_assoc($listResult)) {
							$lists[$lineList['id']] = prepJSONValue($lineList['content']);
						}
					} else if ($listResult && mysql_num_rows($listResult) != 4) {
						terminateWithError(500, "There are no 4 lists in database for that workspace name ! Some data may be corrupted !");
					}
					mysql_free_result($listResult);
				}

				return "{ \"selectedCategory\": $selectedCategory, \"list1\": $lists[0], \"list2\": $lists[1], \"list3\": $lists[2], \"list4\": $lists[3] }";

			} else {
				terminateWithError(500, "Can't retrieve row !");
			}
		} else if ($searchResult && mysql_num_rows($searchResult) > 1) {
			terminateWithError(500, "More than 1 row exists in database with that workspace name ! Some data may be corrupted !");
		} else {
			terminateWithError(404, "Not found !");
		}

		mysql_free_result($searchResult);
		mysql_close($linkDb);
	}

?>
