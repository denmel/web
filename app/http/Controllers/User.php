<?php

namespace App\http\Controllers;

use App\http\Models\UserTable;

class User extends Controller
{
    private UserTable $model;
    private array $left_menu_items = [['caption'=>'Добавить', 'id'=>'btn_add', 'action'=>'/Kid/add'],
        ['caption'=>'Удалить', 'id'=>'btn_del', 'action'=>'/Kid/del'],
        ['caption'=>'Изменить', 'id'=>'btn_upd', 'action'=>'/Kid/upd']
    ];

    function __construct()
    {
        parent::__construct();
        $this->model = new UserTable();
    }

    public function getAll(): void
    {
        $rows = $this->model->getAllRecords();
        $content = $this->view->arrayToTable($rows, $this->model->headers, "list");
        $this->view->generate($content,  $this->left_menu_items, "template_main.php");
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
        $src='http://'.$_SERVER['HTTP_HOST'].'/User/addUser';
        echo "<form action='$src' method='POST'/>";
        echo $this->view->createInput("Логин", "text", "login");
        echo $this->view->createInput("Пароль", "text", "password");
        echo $this->view->createInput("ФИО", "text", "fio");
        echo $this->view->createInput("Роль", "text", "id_role");
        echo $this->view->createInput("Группа", "text", "id_kidgroup");
        echo "<input type='Submit' value='Добавить'>";
        echo "</form>";
        $this->view->generate(ob_get_clean(), $this->left_menu_items, "template_main.php");

    }

    public function addUser(): void
    {
        if (isset($_POST['login']) and isset($_POST['password']) and isset($_POST['fio']) and isset($_POST['id_role']) and isset($_POST['id_kidgroup']))
        {
            $this->model->addRecord(['login'=>$_POST['login'], 'password'=>$_POST['password'], 'fio'=>$_POST['fio'], 'id_role'=>$_POST['id_role'], 'id_kidgroup'=>$_POST['id_kidgroup']]);
        }
        header('Location: /User/getAll');
    }

}