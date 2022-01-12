<?php

$dsn = 'mysql:host=localhost;dbname=bookstore';

$con = new PDO($dsn, 'root', '');
$con->query("create table booklists (
  id int(11)  primary key,
  title varchar(30) not null,
  author varchar(30) not null,
  available varchar(30) not null,
  pages int(10) not null,
  isbn int(10) not null
)");