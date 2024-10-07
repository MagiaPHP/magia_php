<?php include "header.php"; ?>



<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6">
            <hr>
            <?php logo(); ?>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6">
            <hr>
            <div class="panel panel-default">
                <div class="panel-body">

                    <h1><?php _t("Thanks"); ?></h1>

                    <p>
                        <?php _t("Thank you for your registration, come back in 48 hours to verify that your account has been created"); ?>

                    </p>

                    <?php
                    $xxxxxx = "";

                    $contact = contacts_details($subdomain['owner_id']);

                    //vardump($contact);
                    ?>

                    <h3><?php _t("Details"); ?></h3>

                    <table class="table border">



                        <tr>
                            <td><?php _t("Company name"); ?></td><td><?php echo $contact['name']; ?></td>
                        </tr>

                        <tr>
                            <td><?php _t("Vat number"); ?></td><td><?php echo $contact['tva']; ?></td>
                        </tr>




                        <tr>
                            <td><?php _t("Your web"); ?></td><td>
                                <a target="new" href="http://<?php echo strtolower($subdomain['subdomain']); ?>.<?php echo $subdomain['domain']; ?>">http://<?php echo strtolower($subdomain['subdomain']); ?>.<?php echo $subdomain['domain']; ?></a>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                        </tr>




                    </table>

                </div>
            </div>

        </div>
    </div>
</div>


<?php include "footer.php"; ?>