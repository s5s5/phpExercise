<?php
header('Content-Type: text/html; charset=UTF-8');
@mysql_connect("localhost", "root", "root") or die("mysql 连接失败");
@mysql_select_db("x") or die("db连接失败");
mysql_query("SET NAMES 'UTF8'");
session_start();
?>