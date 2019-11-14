BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "vehicules" (
	"id"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"marque"	VARCHAR(255),
	"modele"	VARCHAR(255),
	"slug"	VARCHAR(191),
	"created"	DATETIME_TEXT,
	"modified"	DATETIME_TEXT,
	"user_id"	INTEGER,
	"uuid"	VARCHAR(255),
	FOREIGN KEY("user_id") REFERENCES "users"("id") ON DELETE RESTRICT ON UPDATE RESTRICT
);
CREATE TABLE IF NOT EXISTS "vehicules_tags" (
	"vehicule_id"	INTEGER,
	"tag_id"	INTEGER,
	PRIMARY KEY("vehicule_id","tag_id"),
	FOREIGN KEY("tag_id") REFERENCES "tags"("id") ON DELETE RESTRICT ON UPDATE RESTRICT,
	FOREIGN KEY("vehicule_id") REFERENCES "vehicules"("id") ON DELETE RESTRICT ON UPDATE RESTRICT
);
CREATE TABLE IF NOT EXISTS "files_vehicules" (
	"file_id"	INTEGER,
	"vehicule_id"	INTEGER,
	PRIMARY KEY("file_id","vehicule_id"),
	FOREIGN KEY("file_id") REFERENCES "files"("id") ON DELETE RESTRICT ON UPDATE RESTRICT,
	FOREIGN KEY("vehicule_id") REFERENCES "vehicules"("id") ON DELETE RESTRICT ON UPDATE RESTRICT
);
CREATE TABLE IF NOT EXISTS "defectuosites_vehicules" (
	"vehicule_id"	INTEGER,
	"defectuosite_id"	INTEGER,
	FOREIGN KEY("defectuosite_id") REFERENCES "defectuosites"("id") ON DELETE RESTRICT ON UPDATE RESTRICT,
	FOREIGN KEY("vehicule_id") REFERENCES "vehicules"("id") ON DELETE RESTRICT ON UPDATE RESTRICT
);
CREATE TABLE IF NOT EXISTS "users" (
	"id"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"user_id"	INTEGER,
	"username"	VARCHAR(255),
	"email"	VARCHAR(255),
	"password"	VARCHAR(255),
	"role"	VARCHAR(255) NOT NULL DEFAULT 'utilisateur',
	"created"	DATETIME_TEXT,
	"modified"	DATETIME_TEXT
);
CREATE TABLE IF NOT EXISTS "tags" (
	"id"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"title"	VARCHAR(191),
	"created"	DATETIME_TEXT,
	"modified"	DATETIME_TEXT
);
CREATE TABLE IF NOT EXISTS "i18n" (
	"id"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"locale"	VARCHAR(6),
	"model"	VARCHAR(100),
	"foreign_key"	INTEGER,
	"field"	VARCHAR(100),
	"content"	TEXT
);
CREATE TABLE IF NOT EXISTS "files" (
	"id"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"name"	VARCHAR(255),
	"path"	VARCHAR(255),
	"created"	DATETIME_TEXT,
	"modified"	DATETIME_TEXT,
	"status"	BOOLEAN_INTEGER NOT NULL DEFAULT 1
);
CREATE TABLE IF NOT EXISTS "defectuosites" (
	"id"	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	"description"	VARCHAR(255),
	"slug"	VARCHAR(191),
	"created"	DATETIME_TEXT,
	"modified"	DATETIME_TEXT
);
CREATE TABLE IF NOT EXISTS "phinxlog" (
	"version"	BIGINTEGER,
	"migration_name"	VARCHAR(100),
	"start_time"	TIMESTAMP_TEXT,
	"end_time"	TIMESTAMP_TEXT,
	"breakpoint"	BOOLEAN_INTEGER NOT NULL DEFAULT 0,
	PRIMARY KEY("version")
);
INSERT INTO "vehicules" VALUES (1,'honda','fit','fit','2019-08-26 00:00:00','2019-08-26 00:00:00',0,NULL);
INSERT INTO "vehicules" VALUES (2,'honda','civic','civic','2019-09-05 13:02:01','2019-09-05 13:02:01',0,NULL);
INSERT INTO "vehicules" VALUES (3,'hyundai','elentra','elentra','2019-09-05 14:14:58','2019-09-05 14:14:58',0,NULL);
INSERT INTO "vehicules" VALUES (4,'porsche','911','911','2019-09-05 14:26:12','2019-09-05 14:26:12',0,NULL);
INSERT INTO "vehicules" VALUES (5,'marque test admin','modele test admin','modele test admin','2019-09-06 14:55:38','2019-09-06 14:55:38',0,NULL);
INSERT INTO "vehicules" VALUES (6,NULL,NULL,'TEST','2019-10-15 20:54:38','2019-10-15 20:54:38',0,NULL);
INSERT INTO "files_vehicules" VALUES (7,1);
INSERT INTO "defectuosites_vehicules" VALUES (1,2);
INSERT INTO "users" VALUES (0,0,'admin','admin@admin.com','$2y$10$jeVb3axnvLaTKoMEGJF.3.a2b6H1n8po9kvhnmq9qbe.eFovc73j2','admin','2019-09-05 15:24:15','2019-09-05 15:24:15');
INSERT INTO "users" VALUES (1,0,'fake admin','admin@hotmail.com','$2y$10$PQOUsuV6jdxN.pHXqAcSneY2TO2OxqZAYqR50oWthnlRHUYA6Bboi','utilisateur','2019-08-26 00:00:00','2019-09-05 15:27:52');
INSERT INTO "users" VALUES (2,0,'invite','invite@invite.com','$2y$10$eV.u/v0RB9.rxutu/VruwOWwm4VNGYeF5dailfJTumFDDYS9ie/pS','utilisateur','2019-09-05 13:16:57','2019-09-05 13:16:57');
INSERT INTO "users" VALUES (3,0,'loic','loic@loic.com','$2y$10$IEsRLX8Ajnem1G0A6X6ghuCk9Lt1C7sjwpd.22y1kTgeuVOZPyGhu','utilisateur','2019-09-05 14:24:13','2019-09-05 14:24:13');
INSERT INTO "users" VALUES (4,0,'bob','bob@bob.com','$2y$10$6KCoqnhe8KIrJUlkcb8fX.GVmjSI.xaCALiHSWQPbmCs3c6gQy26W','utilisateur',NULL,'2019-09-05 15:27:23');
INSERT INTO "users" VALUES (5,0,'aaa','a@a.com','$2y$10$0xSPaH95jZvcja4fTTnP4.r91DFS1lP5LKiv7w7DpNjltKB5HedOa','utilisateur','2019-09-11 17:45:22','2019-09-11 17:45:22');
INSERT INTO "users" VALUES (17,NULL,'test','test@test.com','$2y$10$Prscrc0w76HCL1Pf54hQieSgpAFDQLmDTiaJ31m/g1yoLI4fAf6jy','utilisateur','2019-10-11 15:49:44','2019-10-11 15:49:44');
INSERT INTO "users" VALUES (24,NULL,'loicvoyer','loicvoyer99@gmail.com','$2y$10$SC26R3mJ.ZzMdG2WqavNdexGy0YERU03A.WVUoJtG8YcN3yr8V2Ka','utilisateur','2019-10-15 21:46:56','2019-10-15 21:46:56');
INSERT INTO "i18n" VALUES (1,'fr_CA','Vehicules',6,'marque','TEST ADMINma');
INSERT INTO "i18n" VALUES (2,'fr_CA','Vehicules',6,'modele','TEST ADMINmo');
INSERT INTO "i18n" VALUES (3,'fr_CA','Defectuosites',6,'description','admin prob');
INSERT INTO "files" VALUES (7,'image.jpg','uploads/files/','2019-09-16 15:00:25','2019-09-16 15:00:25',1);
INSERT INTO "files" VALUES (8,'artiste4.jpg','uploads/files/','2019-09-25 15:04:32','2019-09-25 15:04:32',1);
INSERT INTO "files" VALUES (9,'eau.jpg','uploads/files/','2019-10-09 14:51:53','2019-10-09 14:51:53',1);
INSERT INTO "files" VALUES (10,'Sky.gif','uploads/files/','2019-10-09 15:06:50','2019-10-09 15:06:50',1);
INSERT INTO "defectuosites" VALUES (2,'changer pneus honda modifié 2x','changer pneus modifié','2019-09-06 15:24:45','2019-09-06 15:59:14');
INSERT INTO "defectuosites" VALUES (4,'abc','8','2019-09-10 16:29:27','2019-09-10 16:29:27');
INSERT INTO "defectuosites" VALUES (5,'','huile','2019-10-02 00:29:26','2019-10-02 00:29:26');
INSERT INTO "defectuosites" VALUES (6,NULL,'admin slug','2019-10-15 21:04:08','2019-10-15 21:04:08');
INSERT INTO "phinxlog" VALUES (20191002021808,'Initial','2019-10-04 15:10:50','2019-10-04 15:10:50',0);
CREATE INDEX IF NOT EXISTS "users_user_id_index" ON "users" (
	"user_id"	ASC
);
CREATE UNIQUE INDEX IF NOT EXISTS "tags_title_index" ON "tags" (
	"title"	ASC
);
CREATE INDEX IF NOT EXISTS "i18n_model_foreign_key_field_index" ON "i18n" (
	"model"	ASC,
	"foreign_key"	ASC,
	"field"	ASC
);
CREATE UNIQUE INDEX IF NOT EXISTS "i18n_locale_model_foreign_key_field_index" ON "i18n" (
	"locale"	ASC,
	"model"	ASC,
	"foreign_key"	ASC,
	"field"	ASC
);
CREATE UNIQUE INDEX IF NOT EXISTS "defectuosites_slug_index" ON "defectuosites" (
	"slug"	ASC
);
COMMIT;
