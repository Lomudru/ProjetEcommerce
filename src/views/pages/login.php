<?php

$title = 'login';

if(isset($_SESSION['user_id']))
{
    header("Location: /?p=home");
    die();
}

ob_start();?>
<div>

    <h1>PAGE LOGIN</h1>
    
    <?php require_once __DIR__ . '/../partials/show_error.php'; ?>
    
    <form action="/actions/login.php" method="POST">
        <input type="email" name="email">
        <input type="password" name="password">
        <button type="submit">Login!</button>
    </form>
</div>
<?php
$page_content = ob_get_clean();
