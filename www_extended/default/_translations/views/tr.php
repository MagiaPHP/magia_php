<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
        <?php include "izq.php" ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-10 col-lg-10">
        <?php include "nav.php"; ?>


        <?php
        if ($_REQUEST && $error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        INSERT INTO `_translations` (`id`, `content`, `language`, `translation`) 
        VALUES <br>

        <?php
        $i = 0;
        foreach (_translations_search_full_by_lang($u_language) as $key => $value) {
            echo "(NULL, '$value[content]', '$value[language]', '$value[translation]') , <br>";
            $i++;
        }
        ?>



    </div>
</div>

<?php include view("home", "footer"); ?> 

