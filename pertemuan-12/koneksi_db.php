<?php

$conn = new mysqli('localhost','root','','pemrograman_web_contoh');

if ($conn->connect_error){
    die('Database gagal:' . $conn->connect_error);
}