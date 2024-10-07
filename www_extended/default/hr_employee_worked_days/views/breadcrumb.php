<ol class="breadcrumb">
    <li><a href="index.php"><?php echo _t("Home"); ?></a></li>
    <li><a href="index.php"><?php echo _t("HR"); ?></a></li>
    <li class="active"><a href="index.php"><?php echo _t("Worked days"); ?></a></li>  

    <?php
    if (modules_field_module('status', "docu")) {
        echo docu_modal($c, $a);
    }
    ?>


</ol>