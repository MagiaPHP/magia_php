<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-md-3">
        <?php include "izq_myInfo.php"; ?>
    </div>
    <div class="col-md-9">              
        <?php include "nav_stats.php"; ?>
        <?php
        if ((isset($smst) && $smst != false ) && (isset($smst) && $smst != false)) {
            message($smst, $smsm);
        }
        ?>


        <?php if ($office_id) { ?>        
            <p><?php _t("Year"); ?>: <?php echo "$year"; ?>, <?php _t("Month"); ?>: <?php echo magia_dates_month($month); ?></p>

            <h2><?php _t("Stats"); ?></h2>
            <p><?php _t("From invoices"); ?></p>
            <?php
            if (offices_is_headoffice($office_id)) {
                // echo "all"; 
                include "table_stats_all_offices.php";
            } else {
                // echo "i"; 
                include "table_stats_by_office.php";
            }
            ?>

            <h2><?php _t("Remakes"); ?></h2>
            <p><?php _t("From orders"); ?></p>
            <?php include "table_stats_remakes.php"; ?>

            <h2><?php _t("Remakes motifs"); ?></h2>
            <p><?php _t("From orders"); ?></p>
            <?php include "table_stats_remakes_motifs.php"; ?>
        <?php } ?>


    </div>
</div>
<?php include view("home", "footer"); ?>