<?php

namespace App\http\Models;

class KidTable extends Table
{
    public array $headers = ["id_kid" => "id", "fio" => "ФИО", "id_kidgroup" => "Группа", "id_parent" => "Родитель"];

    public function getAllRecords(): false|\PDOStatement
    {
        return $this->db->select("SELECT * FROM kid;");
    }

    public function getRecordById($id)
    {
        return $this->db->select("SELECT * FROM kid WHERE id_kid = $id;");
    }

    public function addRecord($values): int
    {
        return $this->db->query("INSERT INTO kid (fio, id_kidgroup, id_parent) VALUE (:fio, :id_kidgroup, :id_parent);", $values);
    }

    public function delRecords($ids): int
    {
        $list = implode(',', $ids);
        return $this->db->query("DELETE FROM kid WHERE id_kid in ($list)");
    }

    public function updRecord($values)
    {
        return $this->db->query("UPDATE kid SET fio=:fio, id_kidgroup=:id_kidgroup, id_parent = :id_parent WHERE id_kid = :id_kid;",$values);
    }
}