<?php

$mysqli = new mysqli('localhost', 'intern', 'password', 'fish_cms');

if ($mysqli->connect_error) {
    echo 'DB接続エラー';
}

$sql = "SELECT * FROM `mst_fish`";
$result = $mysqli->query($sql);
$all_data = $result->fetch_all();

var_dump($all_data);