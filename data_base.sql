create database to_do_list;
use to_do_list;

create table tasks(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    task_content text not null,
);