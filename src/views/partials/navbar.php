<?php

ob_start();?>
<ul>
    <li><a href="/?p=register">Go to Register</a></li>
    <li><a href="/?p=login">Go to Login</a></li>
</ul>
<?php
$navbar = ob_get_clean();
