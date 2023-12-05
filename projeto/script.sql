create database VirtualLibaryPR;
use VirtualLibaryPR;

create table if not exists usuarios(
id tinyint unsigned primary key auto_increment,
email varchar(40) not null,
password char(60) not null
);

create table if not exists cadastro (
 id tinyint unsigned primary key auto_increment,
 email varchar(40) not null,
 password char(60) not null
);

create table books(
 id tinyint unsigned primary key auto_increment,
 Title varchar(50) not null,
 Author varchar(50) not null,
 Chapters int not null,
 Description text not null,
 Gender varchar(20)not null
);

create table registerbooks(
 id tinyint unsigned primary key auto_increment,
 Title varchar(50) not null,
 Author varchar(50) not null,
 Chapters int not null,
 Description text not null,
 Gender varchar(20)not null
);