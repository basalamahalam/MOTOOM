create database db_tubesrpl2;

create table user(
    id_user int(4) not null auto_increment,
    username varchar(50) not null,
    email varchar(50) not null,
    password varchar(50) not null,
    foto varchar(50),
    primary key(id_user) 
);

create table admin(
    id_admin int(4) not null auto_increment,
    email_admin varchar(50) not null,
    password_admin varchar(50) not null,
    primary key(id_admin)
);

create table task(
    id_task int(4) not null auto_increment,
    nama_tugas varchar(50) not null,
	batas_waktu timestamp not null,
	waktu_selesai timestamp DEFAULT CURRENT_TIMESTAMP,
    status boolean,
	id_user int(4) not null,
    primary key(id_task),
	foreign key(id_user) references user(id_user)
);

create table control(
    id_server int(4) not null auto_increment,
    kelembapan int(10) not null,
    waktu_kelembapan timestamp not null,
    id_user int(4),
    primary key(id_server),
	foreign key(id_user) references user(id_user)
);

insert into user values
('','user1','user1@gmail.com','passuser1',null);

insert into user values
('','user2','user2@gmail.com','passuser2',null);

insert into task values
('','mengkasih pupuk','2022-06-20 10:14:07','',false,'1'),
('','mengkasih air','2022-07-10 11:14:07','',true,'1'),
('','mengkasih air lagi','2022-08-10 11:04:07','',false,'1');

insert into control values
('',220,'2022-08-10 10:00:00',1),
('',230,'2022-08-10 11:00:00',1),
('',235,'2022-08-10 12:00:00',1),
('',225,'2022-08-10 13:00:00',1),
('',240,'2022-08-10 14:00:00',1);

insert into control values
('',250,'2022-05-19 10:00:00',1),
('',140,'2022-05-19 11:00:00',1),
('',200,'2022-05-19 12:00:00',1);

insert into control values
('',270,'2022-05-19 14:00:00',1);

insert into control values
('',90,'2022-05-19 10:00:00',2),
('',100,'2022-05-19 11:00:00',2),
('',400,'2022-05-19 12:00:00',2);

insert into control values
('',90,'2022-05-20 00:00:00',1),
('',95,'2022-05-20 01:00:00',1),
('',100,'2022-05-20 02:00:00',1),
('',200,'2022-05-20 03:00:00',1),
('',50,'2022-05-20 04:00:00',1),
('',90,'2022-05-20 05:00:00',1),
('',80,'2022-05-20 06:00:00',1),
('',74,'2022-05-20 07:00:00',1),
('',90,'2022-05-20 08:00:00',1),
('',95,'2022-05-20 09:00:00',1),
('',100,'2022-05-20 10:00:00',1),
('',20,'2022-05-20 11:00:00',1),
('',290,'2022-05-20 12:00:00',1),
('',90,'2022-05-20 13:00:00',1),
('',80,'2022-05-20 14:00:00',1),
('',40,'2022-05-20 15:00:00',1),
('',290,'2022-05-20 16:00:00',1),
('',90,'2022-05-20 17:00:00',1),
('',80,'2022-05-20 18:00:00',1),
('',40,'2022-05-20 19:00:00',1),
('',90,'2022-05-20 20:00:00',1),
('',90,'2022-05-20 21:00:00',1),
('',90,'2022-05-20 22:00:00',1),
('',20,'2022-05-20 23:00:00',1),
('',74,'2022-05-20 24:00:00',1);