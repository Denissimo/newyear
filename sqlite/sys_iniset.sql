DROP TABLE IF EXISTS "sys_iniset";
CREATE TABLE `sys_iniset` (`row_id` INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL ,`parameter` VARCHAR(255)  NULL DEFAULT NULL,`value` VARCHAR(255)  NULL DEFAULT NULL);
INSERT INTO "sys_iniset" VALUES(9,'magic_quotes_gpc','0');
INSERT INTO "sys_iniset" VALUES(10,'upload_tmp_dir','/home/promo/www/temp/');
