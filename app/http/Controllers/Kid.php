<?php

namespace App\http\Controllers;

use App\http\Models\KidTable;

class Kid extends Controller
{
    private KidTable $model;
    private array $left_menu_items = [['caption'=>'Добавить', 'id'=>'btn_add', 'action'=>'/Kid/add'],
        ['caption'=>'Удалить', 'id'=>'btn_del', 'action'=>'/Kid/del'],
        ['caption'=>'Изменить', 'id'=>'btn_upd', 'action'=>'/Kid/upd']
    ];

    function __construct()
    {
        parent::__construct();
        $this->model = new KidTable();
    }

    public function getAll(): void
    {
        $rows = $this->model->getAllRecords();
        $content = $this->view->arrayToTable($rows, $this->model->headers, "list");
        $this->view->generate($content, $this->left_menu_items,"template_main.php");
    }

    public function del(): void
    {
        $ids = json_decode(file_get_contents('php://input'), JSON_OBJECT_AS_ARRAY);
        $rowCount = $this->model->delRecords($ids['ids']);
        echo json_encode(['count'=>$rowCount]);
    }

    public function add(): void
    {
        ob_start();
        $src = '/Kid/addKid';
        echo "<form action='$src' method='POST'/>";
        echo $this->view->createInput("ФИО ребенка", "text", "fio");
        echo $this->view->createInput("Группа", "text", "id_kidgroup");
        echo $this->view->createInput("Родитель", "text", "id_parent");
        echo "<input type='Submit' value='Добавить'>";
        echo "</form>";
        $this->view->generate(ob_get_clean(), $this->left_menu_items, "template_main.php");
    }

    public function addKid(): void
    {
        if (isset($_POST['fio']) and isset($_POST['id_kidgroup']) and isset($_POST['id_parent']))
        {
            $this->model->addRecord(['fio'=>$_POST['fio'], 'id_kidgroup'=>$_POST['id_kidgroup'], 'id_parent'=>$_POST['id_parent']]);
        }
        header('Location: /Kid/getAll');
    }

    public function upd($id)
    {
        ob_start();
        $row = $this->model->getRecordById($id)->fetch();
        $src = "/Kid/updKid";
        echo "<form action='$src' method='POST'>";
        echo $this->view->createInput("Id", "text", "id_kid", $row['id_kid']);
        echo $this->view->createInput("ФИО ребенка", "text", "fio", $row['fio']);
        echo $this->view->createInput("Группа", "text", "id_kidgroup", $row['id_kidgroup']);
        echo $this->view->createInput("Родитель", "text", "id_parent", $row['id_parent']);
        echo "<input type='submit' value='Изменить'>";
        echo "</form>";
        $this->view->generate(ob_get_clean(), $this->left_menu_items, 'template_main.php');
    }

    public function updKid()
    {
        if (isset($_POST['fio']) and isset($_POST['id_kidgroup']) and isset($_POST['id_parent']))
        {
            $this->model->updRecord(['id_kid'=>$_POST['id_kid'], 'fio'=>$_POST['fio'], 'id_kidgroup'=>$_POST['id_kidgroup'], 'id_parent'=>$_POST['id_parent']]);
        }
        header('Location: /Kid/getAll');
    }


}