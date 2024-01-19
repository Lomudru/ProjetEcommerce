<?php

$title = 'login';

if(isset($_SESSION['user_id']))
{
    header("Location: /?p=home");
    die();
}

ob_start();?>
<main>
    <h1>PAGE LOGIN</h1>
    
    <?php require_once __DIR__ . '/../partials/show_error.php'; ?>
    
    <div class="login-box">
        <form action="/actions/login.php" method="POST">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Mot de passe">
            <button type="submit">Login</button>
        </form>
    </div>
</main>

<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    main {
        background-color: white;
    }

    h1 {
        color: black;
        display: flex;
        justify-content: center;
        padding-top: 150px;
        padding-bottom: 50px;
        font-size: 70px;
    }

    .login-box {
        display: flex;
        justify-content: center;
        padding-top: 60px;
        padding-bottom: 200px;
    }

    form {
        display: flex;
        flex-direction: column;
        width: 30%;
        justify-content: center;
        align-items: center;
        border: 1px solid black;
        padding-top: 50px;
        padding-bottom: 50px;
        gap: 20px;
    }

    input {
        padding: 10px 30px;
    }

    button {
        background-color: black;
        color: white;
        padding: 10px 30px;
        border: none;
        cursor: pointer
    }
</style>

<?php
$page_content = ob_get_clean();
