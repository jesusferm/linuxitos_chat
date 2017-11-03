CREATE DATABASE linuxitos_chat;
use linuxitos_chat;

create table usuarios(
	id_user int auto_increment PRIMARY KEY,
	nickname VARCHAR(80)
);

create table mensajes (
	id_msg int auto_increment PRIMARY KEY,
	user_id int,
	mensaje varchar(300),
	fecha_creado timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	foreign key(user_id) references usuarios(id_user) on update cascade on delete cascade
);

CREATE  PROCEDURE agregarUsuarioNuevo(nick VARCHAR(80))
BEGIN
	INSERT INTO usuarios(LOWER(nickname)) VALUES(nick);
END

CREATE  PROCEDURE obtIdUltimoUsuario(nick VARCHAR(300))
BEGIN
	select id_user from usuarios where nickname=nick ORDER BY id_user DESC;
END

CREATE  PROCEDURE obtInfoUsuario(id int)
BEGIN
	select id_user, nickname from usuarios where  id_user = id;
END

CREATE  PROCEDURE agregarMensaje(id int, msg VARCHAR(300))
BEGIN
	INSERT INTO mensajes(user_id, mensaje) VALUES(id, msg);
END

CREATE  PROCEDURE seleccionarTodosMensajes(limite int)
BEGIN
	SELECT u.id_user, u.nickname, m.id_msg, m.mensaje, m.fecha_creado
	FROM usuarios u
		INNER JOIN mensajes m
		ON u.id_user = m.user_id
		order by m.fecha_creado asc limit limite;
END








