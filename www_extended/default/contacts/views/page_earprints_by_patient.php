<?php include view("contacts", "page_header"); ?> 

<?php include view("contacts", "nav_earprints_by_patient"); ?>  


<h3>
    <?php _t("Earprints list by patient"); ?>
</h3>



<?php
if ($earprints_l) {
    $earprints = $earprints_l;
    ?> 
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="#"><?php _t("Left ear"); ?></a></li>
    </ul>

    <?php
    include 'page_table_patient_earprints.php';
} else {
    message('info', "No items");
}
?>



<?php
// reseteo 
$earprints = null;

if ($earprints_r) {

    $earprints = $earprints_r;
    ?>
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="#"><?php _t("Right ear"); ?></a></li>
    </ul>
    <?php
    include 'page_table_patient_earprints.php';
} else {
    message('info', "No items");
}
?>

<?php include view("contacts", "page_footer"); ?>  

