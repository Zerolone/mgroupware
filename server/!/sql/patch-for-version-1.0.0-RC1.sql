
CREATE TABLE `lists` (
`workspace` VARCHAR( 32 ) NOT NULL ,
`id` INT NOT NULL ,
`content` TEXT NOT NULL ,
PRIMARY KEY ( `workspace` , `id` )
) ENGINE = MYISAM ;

ALTER TABLE `workspaces`
  DROP `list1`,
  DROP `list2`,
  DROP `list3`,
  DROP `list4`;

TRUNCATE TABLE `workspaces`;
