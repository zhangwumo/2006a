<?php
//pdo 数据库操作
function getPdo()
{
$host = "127.0.0.1";
$user = "root";
$pass = "root";
$db = "2006";
return new PDO("mysql:host=$host;dbname=$db",$user,$pass);
} 