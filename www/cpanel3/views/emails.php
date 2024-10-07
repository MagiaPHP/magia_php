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
        <h1><?php _t("Emails"); ?></h1>

        <table class="table table-responsive">
            <thead>
                <tr>
                    <th></th>
                    <th><?php _t("Email"); ?></th>
                    <th><?php _t("suspended_login"); ?></th>
                    <th><?php _t("suspended_incoming"); ?></th>
                    <th><?php _t("login"); ?></th>
                </tr>
            </thead>

            <tbody>
                <?php
                $i = 1;
                foreach ($email_list['result']['data'] as $key => $email) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $email['email'] ?></td>
                        <td><?php echo $email['suspended_login'] ?></td>
                        <td><?php echo $email['suspended_incoming'] ?></td>
                        <td><?php echo $email['login'] ?></td>
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

