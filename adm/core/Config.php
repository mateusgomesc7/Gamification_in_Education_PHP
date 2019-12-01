<?php
session_start();
ob_start();

define('URL', 'http://localhost/gamification_in_education/');
define('URLADM', 'http://localhost/gamification_in_education/adm/');

define('CONTROLER', 'Home');
define('METODO', 'index');

//Credenciais de acesso ao BD
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'gamification');
