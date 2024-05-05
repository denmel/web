<?php
$menu_items = ['Пользователи'=>'/User/getAll', 'Дети'=>'/Kid/getAll' ];

foreach ($menu_items as $name=>$link){
    echo "<div class='main-menu-button'><span><a href='$link'>$name</a></span></div>";
}