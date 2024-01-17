<?php

$title = 'commande';

ob_start();?>
<div>
    COMMANDE PAGE
    <form action="/actions/" method="post">
        <input type="text" name="adresse">
        <input type="submit" name="" value="finaliser ma commande">
    </form>
</div>
<?php
$page_content = ob_get_clean();
