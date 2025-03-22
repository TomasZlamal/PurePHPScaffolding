<?php

function render_view($viewname, $params, $unsafe)
{
    $temp = [];
    foreach ($params as $key => $value) {
        $temp[$key] = htmlspecialchars($value);
    }
    $params = $temp;
    unset($temp);
    global $viewpath;
    require $viewpath.$viewname.".view.php";
}
