<?php
if (modules_field_module('status', 'public_html')) {
    include controller("public_html", "index");
} else {
    ?> 

    <?php include "header.php"; ?>


    <style>

        body {

            background-image:url("https://picsum.photos/1920/1080");
            opacity: 0.99;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>


    <div class="container-fluid" id="body_login">

        <div class="col-lg-4"></div>
        <div class="col-lg-4"><br>

            <div class="panel panel-default">
                <div class="panel-body">
                    <?php include view("home", "form_login"); ?>
                </div>
            </div>

        </div>
        <div class="col-lg-4"></div>

    </div>



    <?php include "footer.php"; ?>

<?php } ?>





