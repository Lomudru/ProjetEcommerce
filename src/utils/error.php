<?php

function set_errors($msg, $page) {
    $_SESSION['error_message'] = $msg;
    header('Location: /?p='.$page);
    die();
}
