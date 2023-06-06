create table users (
    id int auto_increment NOT NULL primary key,
    email VARCHAR(255) NOT NULL UNIQUE,
    password varchar(255) not null,
    first_name varchar(50) not null,
    last_name varchar(50) not null,
    role int not null,
    sex int not null,
    address varchar(1000),
    created_at datetime,
    updated_at datetime
);

create table categories (
    id int auto_increment NOT NULL primary key,
    name VARCHAR(255) NOT NULL UNIQUE,
    user_id int 
);

create table news (
    id int auto_increment NOT NULL primary key,
    content VARCHAR(5000) NOT NULL,
    category_id int,
    user_id int
);

INSERT INTO users (email, password, role, first_name, last_name, sex)
VALUES ('admin@gmail.com', md5('123'), 1, 'pham', 'tuyet', 2);
