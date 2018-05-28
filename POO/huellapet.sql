DROP SCHEMA IF EXISTS huellaPet;
CREATE SCHEMA huellaPet;
USE huellaPet;

CREATE TABLE nacionalidades(
	id tinyint(1) unsigned not null auto_increment primary key,
	nacionalidad varchar(20) not null unique

)ENGINE=innoDB;

CREATE TABLE usuarios(
	id tinyint(2) unsigned zerofill auto_increment primary key,
	nombre varchar (200) not null,
	apellido varchar(200) not null,
	email varchar(200) not null unique,
	password varchar(200) not null,
	imagen varchar(200) not null,
	id_nacionalidad tinyint(1) unsigned,
	foreign key(id_nacionalidad) references nacionalidades(id) on update cascade on delete restrict 
	)ENGINE=innoDB;


INSERT INTO nacionalidades VALUES (null, 'Argentina'), (null, 'Uruguay'), (null, 'Brasil'), (null, 'Otro');