<?php
    require ('init.php');
    $action_name = '\\controller\\' . ucfirst($_GET['action']);
    session_start();
    (new $action_name())->run(new \vendor\Output());