ALTER TABLE `realmlist`
	ADD COLUMN `ra`  tinyint(2) NOT NULL DEFAULT '1',
	ADD COLUMN `ra_port`  int(11) NOT NULL DEFAULT '3443' AFTER `ra`,
	ADD COLUMN `soap`  tinyint(2) NOT NULL DEFAULT '0' AFTER `ra_port`,
	ADD COLUMN `soap_port`  int(11) NOT NULL DEFAULT '7878' AFTER `soap`,
	ADD COLUMN `char_db` varchar(32) NOT NULL DEFAULT 'characters' AFTER `soap_port`,
	ADD COLUMN `world_db` varchar(32) NOT NULL DEFAULT 'world' AFTER `char_db`,
	ADD COLUMN `p_limit` int(11) NOT NULL DEFAULT '1000' AFTER `world_db`,
	ADD	COLUMN `unstuck` tinyint(2) NOT NULL DEFAULT '1' AFTER `p_limit`,
	ADD	COLUMN `teleport` tinyint(2) NOT NULL DEFAULT '1' AFTER `unstuck`,
	ADD	COLUMN `changes` tinyint(2) NOT NULL DEFAULT '1' AFTER `teleport`,
	ADD COLUMN `3d_char_preview`  tinyint(2) NOT NULL DEFAULT '0' AFTER `changes`,
	ADD	COLUMN `unstuck_price` varchar(10) NOT NULL DEFAULT '0' AFTER `3d_char_preview`,
	ADD	COLUMN `teleport_price` varchar(10) NOT NULL DEFAULT '0' AFTER `unstuck_price`,
	ADD	COLUMN `change_faction_price` varchar(10) NOT NULL DEFAULT '0' AFTER `teleport_price`,
	ADD	COLUMN `change_race_price` varchar(10) NOT NULL DEFAULT '0' AFTER `change_faction_price`,
	ADD	COLUMN `change_appearance_price` varchar(10) NOT NULL DEFAULT '0' AFTER `change_race_price`;
	ADD	COLUMN `core` varchar(10) NOT NULL DEFAULT 'trinity' AFTER `change_appearance_price`;