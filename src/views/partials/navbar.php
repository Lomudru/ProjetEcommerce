<?php

ob_start();?>
 <body>
        <header>
            <nav>
                <div class="navbar">
                    <div class="nav1">
                        <p>LA MARQUE</p>
                    </div>

                    <div class="nav2">
                        <ul>
                            <li><a href="/?p=home">ACCUEIL</a></li>
                            <li><a href="/?p=sexe&sexe=HOMME">HOMME</a></li>
                            <li><a href="/?p=sexe&sexe=FEMME">FEMME</a></li>
                            <li><a href="/?p=panier">PANIER</a></li>
                        </ul>
                    </div>

                    <?php if(isset($_SESSION["user_id"]))
                    { ?>
                        <a href="/?p=home&disconnect=true">SE DÉCONNECTER</a>
                    <?php }
                    else { ?>

                    <div class="nav3">
                        <a href="/?p=login">Login</a>
                        <a href="/?p=register">Register</a>
                    </div>

                    <?php } ?>
                </div>
            </nav>
        </header>
    </body>
<?php
$navbar = ob_get_clean();
