<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<?php require_once("header.inc.php"); ?>
	<link rel="stylesheet" type="text/css" href="css/index.css" media="all"/>
	<script type="text/javascript" src="js/lib/prototype.js"></script>
	<script type="text/javascript" src="js/index-behavior.js"></script>
</head>
<body>
	<div id="content">
		<h1>Another To-do List</h1>

		<div id="sidebar">
			<form action="application.php" method="get">
				<fieldset id="workspaceSelection">
					<legend>Load a workspace</legend>
					<label for="workspace">Workspace</label> : <input type="text" name="workspace" id="workspace" value="demo" maxlength="8"/>
					<input type="submit" value="load"/>
				</fieldset>
			</form>
		    <a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a><br/>
			<a href="http://sourceforge.net/projects/anothertodolist" style="border:0px;" title="Go to SourceForge.net">
				<img src="http://sflogo.sourceforge.net/sflogo.php?group_id=203914&amp;type=1" width="88" height="31" border="0" alt="SourceForge.net Logo"/>
			</a>
		</div>

		<div id="presentation">
			<h2>What is Another To-do List ?</h2>
			<p>Another To-do List is a web project designed to organize your to-do lists.</p>
			<h2>How to use it ?</h2>
			<p>To enter a workspace, you just have to enter a name inside the &quot;workspace&quot; field on the right. Then, you'll be able to create your tasks.</p>
	<?php if (DEMO_MODE) { ?>
			<p><strong>Note</strong> : the application is in a demo mode so you won't be able to save your data.<br/>
			In order to do so, you have to install it on your webserver.</p>
	<?php } ?>
			<h2>Open Source</h2>
			<p>Another To Do List is an <a href="http://en.wikipedia.org/wiki/Open_source" title="Open source definition on Wikipedia">open source</a> project available on <a href="http://sourceforge.net/projects/anothertodolist" title="link to project webpage on SourceForge">SourceForge</a>.</p>
			<p>You're free to <a href="http://sourceforge.net/projects/anothertodolist" title="link to project webpage on SourceForge">download</a> the project and deploy it on your webserver.</p>
			<h2>About</h2>
			<p>This application has been made by Gr&eacute;gory PAUL.<br/><a href="mailto:paul-gregory-at-sourceforge.net">paul-gregory-at-sourceforge.net</a></p>
		</div>

		<?php require_once("footer.inc.php"); ?>
	</div>
</body>
</html>

