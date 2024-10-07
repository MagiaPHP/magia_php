<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-lg-9">
        <?php //include "nav.php"; ?>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <h1><?php _t("DB"); ?></h1>

        <table class="table table-responsive">
            <thead>
                <tr>
                    <th></th>
                    <th><?php _t("Data base"); ?></th>
                    <th><?php _t("Users"); ?></th>
                    <th><?php _t("Disk usage"); ?></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php
                $i = 1;
                foreach ($db_list['result']['data'] as $key => $db) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $db['database'] ?></td>
                        <td></td>
                        <td><?php echo $db['disk_usage'] ?></td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>






    </div>
</div>

<?php include view("home", "footer"); ?> 

