<?php

$title = 'register';

if(isset($_SESSION['user_id']))
{
    header("Location: /?p=home");
    die();
}

ob_start();?>
<div>
    <h1>PAGE REGISTER</h1>
    
    <?php require_once __DIR__ . '/../partials/show_error.php'; ?>
    
    <form action="/actions/register.php" method="POST">
        <input type="email" name="email">
        <input type="password" name="password">
        <input type="password" name="cpassword">
        <button type="submit">Register now!</button>
    </form>
</div>
<?php
$page_content = ob_get_clean();
