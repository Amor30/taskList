-- Добавление таблицы задач -- 
create table tasks (
	id int(10) unsigned not null auto_increment primary key,
	user_id int(10) unsigned not null,
	description varchar(255) not null,
	created_at timestamp default current_timestamp,
	status boolean default false,
	foreign key(user_id) references users(id)
)
engine = innodb
auto_increment = 1
character set utf8
collate utf8_general_ci;