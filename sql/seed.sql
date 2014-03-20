CREATE TABLE users (
	id					bigserial		  constraint pk_usuario primary key,
	username		varchar(30)		not null constraint uq_users_user unique,
	password		varchar(60)		not null,
	created_at  date
)