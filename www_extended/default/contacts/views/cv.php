<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include "izq.php"; ?>

    </div>

    <div class="col-lg-9">

        <?php
        include "nav.php";
        ?>

        <?php
        echo '<div class="row">';
        //foreach ($liste_info as $contact) {
        foreach ($contacts_list as $contact) {
            include "tr_cv.php";
        }

        echo '</div>';
        ?>	


        Export: <a href="index;php?c=contacts&a=export_json">JSON</a>

    </div>
</div>

<?php include view("home", "footer"); ?>  

