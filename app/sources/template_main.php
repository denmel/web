<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<div id="main-layout">
    <header>
        <nav>
            <?php
            require_once "main_menu.php";
            ?>
        </nav>
    </header>
    <aside>
        <nav>
            <?php
            require_once "left_menu.php";
            ?>
        </nav>
    </aside>
    <main>
        <?php
        echo $content;
        ?>
    </main>
</div>
</body>
<script src="../../js/script.js"></script>
</html>


