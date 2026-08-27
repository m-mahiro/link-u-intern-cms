<?php
namespace Sakana\Model;

use mysqli;

class TestRepository
{
    private $host, $db_name, $user, $password, $mysqli;
    public function __construct() {
        $this->host = 'localhost';
        $this->db_name = 'fish_cms';
        $this->user = 'intern';
        $this->password = 'password';
        try {
            //MySQLに接続
            $this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        } catch (Exception $e) {
            echo $e . "\n";
        }
    }
    public function select(): array  {
        //クエリ実行
        $sql = "SELECT * FROM mst_fish";
        $result = $this->mysqli->query($sql);
        return array_map(function ($row) {
            return [
                'id' => $row[0],
                'name' => $row[1],
                'comment' => $row[2],
            ];
        }, $result->fetch_all());
    }
}