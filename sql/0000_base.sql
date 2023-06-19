-- Таблица versions --
CREATE TABLE if not exists versions (
	id int(10) unsigned not null auto_increment PRIMARY KEY,
	name varchar(255) not null,
	created timestamp default current_timestamp
)
engine = innodb
auto_increment = 1
character set utf8
collate utf8_general_ci; 