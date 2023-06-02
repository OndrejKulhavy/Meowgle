create database meowgle;

use meowgle;

create table user(
    id int auto_increment primary key,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    email varchar(60) not null,
    password varchar(200) not null
);

insert into  user (first_name, last_name, email, password) values ('Šimon', 'Bernard', 'simon@ahoj.cz', 'kokot')