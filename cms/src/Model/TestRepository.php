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
    
    public function __destruct() {
        $this->mysqli->close();
    }

    /**
     * mst_fishテーブルの全データを取得します
     * @return array{comment: string, id: int, name: string}
     */
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

    /**
     * mst_fishテーブルにデータを追加します
     * @param array{name: string, comment: string} $data
     * @return bool 成功したら`true`、失敗したら`false`を返します。
     */ 
    public function insert(array $data): bool {
        $sql = "INSERT INTO mst_fish (`name`, `comment`) VALUE (? , ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('ss', $data['name'], $data['comment']);
        return $stmt->execute();    
    }

    /**
     * mst_fishテーブルから、指定されたレコードを取得します
     * @param int $id
     * @return array|bool|null
     */
    public function fetch(int $id): array {
        $sql = "SELECT * FROM mst_fish WHERE `id` = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    /**
     * 指定されたデータを、更新します。
     * @param array $data
     * @return bool 成功したら`true`、失敗したら`false`を返します。
     */
    public function update(array $data) {
        $sql = "UPDATE `mst_fish` SET `name` = ?, `comment` = ? WHERE `id` = ?" ;
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ssi", $data['name'], $data['comment'], $data['id']);
        return $stmt->execute();
    }
}