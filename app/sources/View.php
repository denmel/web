<?php

class View
{
    function generate ($content, $left_menu_items, $template){
        include $template;
    }

    public function arrayToTable($rows, $headers, $class = null, $id = null): false|string
    {
        $keys = array_keys($headers);
        ob_start();
        echo "<table";
        if ($class) echo " class='$class'";
        if($id) echo " id='$id'";
        echo "><thead><tr><th>№</th>";
        foreach (array_splice($headers, 1) as $header) {
            echo "<th>$header</th>";
        }
        echo "</tr></thead><tbody>";
        $num = 0;
        foreach ($rows as $row) {
            echo sprintf("<tr data-id='%d'><td>%d</td>",$row[0],++$num);
            foreach (array_slice($keys,1) as $key) {
                echo "<td>$row[$key]</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
        return ob_get_clean();
    }

    public function createInput($label, $type, $name): false|string
    {
        ob_start();
        echo "<label for='$name'>$label:</$label><br>";

        echo "<input type='$type' id='$name' name='$name'/><br>";
        return ob_get_clean();
    }

}