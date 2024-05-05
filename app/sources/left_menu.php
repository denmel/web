<?php

foreach ($left_menu_items as $item){
    echo sprintf("<div class='left-menu-button' id='%s' action='%s'><span>%s</span></div>", $item['id'], $item['action'], $item['caption']);
}