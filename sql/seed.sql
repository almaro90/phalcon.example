DROP TABLE users;

CREATE TABLE users {
	id					bigserial		  constraint pk_usuario primary key,
	username		varchar(30)		not null constraint uq_users_user unique,
	password		varchar(60)		not null,
	created_at  datetime 			NOT NULL
}

FOR i IN 1..10 LOOP
  insert into usuarios (username, password, created_at) values ('user' || i,md5('almaro90'),CURRENT_DATE,);
END LOOP;