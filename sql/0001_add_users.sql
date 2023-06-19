-- Добавление таблицы users --
create table users (
	id int(10) unsigned not null auto_increment primary key,
	login varchar(255) not null,
	password varchar(250) not null,
	created_at timestamp default current_timestamp
)
engine = innodb
auto_increment = 1
character set utf8
collate utf8_general_ci;