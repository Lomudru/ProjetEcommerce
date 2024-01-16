<?php

ob_start();?>
<footer>
    <div class="footer_global">
        <div class="footer_first">
            <div class="footer_grp1">
                <ul class="footer_title_grp">
                    <li>NOS SERVICES</li>
                </ul>
                <br>
                <ul class="footer_list">
                    <li class="footer_li">Rejoignez-nous</li>
                    <li class="footer_li">Services personnalisées</li>
                    <li class="footer_li">Offres d'emploi</li>
                </ul>
            </div>
            <div class="footer_grp2">
                <ul class="footer_title_grp">
                    <li>AIDE</li>
                </ul>
                <br>
                <ul class="footer_list">
                    <li class="footer_li">Historique des prestations</li>
                    <li class="footer_li">Nous contacter</li>
                    <li class="footer_li">SAV</li>
                </ul>
            </div>
            <div class="footer_grp3">
                <ul class="footer_title_grp">
                    <li>CONDITIONS</li>
                </ul>
                <br>
                <ul class="footer_list">
                    <li class="footer_li">Paramètres de cookies</li>
                    <li class="footer_li">Conditions d'utilisations</li>
                    <li class="footer_li">Condition générale de vente</li>
                    <li class="footer_li">Politique de confidentalité et de cookie</li>
                    <li class="footer_li">Mentions légales</li>
                </ul>
            </div>
            <div class="footer_grp4">
                <ul class="footer_title_grp">
                    <li>CHANGER DE PAYS ET DE LANGUE</li>
                </ul>
                <br>
                <select name="langues" id="langues">
                    <option value="France">France</option>
                    <option value="Anglais">Anglais</option>
                    <option value="Espagnol">Espagnol</option>
                    <option value="Italien">Italien</option>
                </select>
            </div>
        </div>
        <div class="footer_second">
            <div class="logo_social">
                <script src="https://kit.fontawesome.com/f09ae54942.js" crossorigin="anonymous"></script>
                <a href="https://www.instagram.com/">
                    <div class="logo_link"><i class="fa-brands fa-instagram" style="color: #fafcff;"></i></div>
                </a>
                <a href="https://www.tiktok.com/@infinitywashoff">
                    <div class="logo_link"><i class="fa-brands fa-tiktok" style="color: #fafcff;"></i></div>
                </a>
                
            </div>
            <div class="logo_payment">
                <i class="fa-brands fa-cc-visa" style="color: #fafcff;"></i>
                <i class="fa-brands fa-cc-mastercard" style="color: #fafcff;"></i>
                <i class="fa-brands fa-cc-paypal" style="color: #fafcff;"></i>
                <i class="fa-brands fa-cc-apple-pay" style="color: #fafcff;"></i>
            </div>
            
        </div>
    </div>
</footer>
<?php
$footer = ob_get_clean();
