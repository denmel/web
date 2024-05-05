<?php

require_once __DIR__."/Table.php";
class UserTable extends Table
{
    public array $headers = ["id_user" => "id", "login" => "Логин", "password" => "Пароль", "fio" => "ФИО", "id_role" => "Роль", "id_kidgroup" => "Группа"];

    public function getAllRecords(): false|PDOStatement
    {
        return $this->db->select("SELECT * FROM user;");
    }

    public function addRecord($values)
    {
        return $this->db->query("INSERT INTO user (login, password, fio, id_role, id_kidgroup) VALUE (:login, :password, :fio, :id_role, :id_kidgroup);", $values);
    }

    public function delRecords($ids): int
    {
        $list = implode(',', $ids);
        return $this->db->query("DELETE FROM user WHERE id_user in ($list)");
    }
}