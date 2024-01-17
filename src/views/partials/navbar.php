<?php

ob_start();?>
 <body>
        <header>
            <nav>
                <div class="navbar">
                    <div class="nav1">
                        <p>a</p>
                    </div>

                    <div class="nav2">
                        <ul>
                            <li><a href="">ACCUEIL</a></li>
                            <li><a href="">HOMME</a></li>
                            <li><a href="">FEMME</a></li>
                            <li><a href="">À PROPOS</a></li>
                        </ul>
                    </div>

                    <div class="nav3">
                        <button class="btn1">Login</button>
                        <button class="btn2">Sing up</button>
                    </div>
                </div>
            </nav>
        </header>
    </body>
<?php
$navbar = ob_get_clean();
