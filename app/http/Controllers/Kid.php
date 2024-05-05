<?php

require_once __DIR__."/../Models/KidTable.php";
require_once __DIR__."/Controller.php";

class Kid extends Controller
{
    private $model;
    private $left_menu_items = [['caption'=>'Добавить', 'id'=>'btn_add', 'action'=>'/Kid/add'],
        ['caption'=>'Удалить', 'id'=>'btn_del', 'action'=>'/Kid/del'],
        ['caption'=>'Изменить', 'id'=>'btn_upd', 'action'=>'/Kid/upd']
    ];

    function __construct()
    {
        parent::__construct();
        $this->model = new KidTable();
    }

    public function getAll()
    {
        $rows = $this->model->getAllRecords();
        $content = $this->view->arrayToTable($rows, $this->model->headers, "list");
        $this->view->generate($content, $this->left_menu_items,"template_main.php");
    }

    public function del()
    {
        $ids = json_decode(file_get_contents('php://input'), JSON_OBJECT_AS_ARRAY);
        $rowCount = $this->model->delRecords($ids['ids']);
        echo json_encode(['count'=>$rowCount]);
    }

    public function add()
    {
        ob_start();
        $src='http://'.$_SERVER['HTTP_HOST'].'/Kid/addKid';
        echo "<form action='$src' method='POST'/>";
        echo $this->view->createInput("ФИО ребенка", "text", "fio");
        echo $this->view->createInput("Группа", "text", "id_kidgroup");
        echo $this->view->createInput("Родитель", "text", "id_parent");
        echo "<input type='Submit' value='Добавить'>";
        echo "</form>";
        $this->view->generate(ob_get_clean(), $this->left_menu_items, "template_main.php");

    }

    public function addKid()
    {
        if (isset($_POST['fio']) and isset($_POST['id_kidgroup']) and isset($_POST['id_parent']))
        {
            $this->model->addRecord(['fio'=>$_POST['fio'], 'id_kidgroup'=>$_POST['id_kidgroup'], 'id_parent'=>$_POST['id_parent']]);
        }
        header('Location: /Kid/getAll');
    }
}