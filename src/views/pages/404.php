<?php

$title = '404 not found';

ob_start();?>
<div>
    PAGE 404
</div>
<?php
$page_content = ob_get_clean();
