<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php include view("import", "nav"); ?>
        <?php // include view("import", "nav_contacts"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <form class="form-inline">
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox"> Check me out
                </label>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>

        <hr>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <h1><?php _menu_icon('top', "contacts") ?> <?php _t("Contacts"); ?></h1>

        <div class="row">

            <?php
            foreach ($cards as $key => $card) {

                // vardump($cards);
                ?>

                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="www/gallery/img/noimage.jpg" alt="...">
                        <div class="caption">
                            <h3><?php echo $card['company']['name']; ?></h3>
                            <p><?php _t('Tva'); ?>: <?php echo $card['company']['vat']; ?></p>


                            <p>
                                <?php echo $card['addresses']['Billing']["number"]; ?> <?php echo $card['addresses']['Billing']["address"]; ?><br>
                                <?php echo $card['addresses']['Billing']["postcode"]; ?> <?php echo $card['addresses']['Billing']["barrio"]; ?><br>
                                <?php echo $card['addresses']['Billing']["city"]; ?> <?php echo $card['addresses']['Billing']["country"]; ?><br>
                                <?php _t("Tel"); ?>: <?php echo $card['company']["Tel"]; ?><br>

                            </p>

                            <p>
                                <a href="index.php?c=import&a=ok_contacts_add&tva=<?php echo $card['company']['vat']; ?>" class="btn btn-primary" role="button"><?php _t("Add like a contact"); ?></a> 


                            </p>
                        </div>
                    </div>
                </div>


            <?php }
            ?>



        </div>







        <form class="form-horizontal"  action="index.php" method="post">
            <input type="hidden" name="c" value="import">
            <input type="hidden" name="a" value="ok_contacts">


            <div class="form-group">
                <label for="contacts" class="col-sm-2 control-label">
                    <?php _t("Contacts"); ?>
                </label>
                <div class="col-sm-10">

                    <textarea class="form-control" rows='10' name="contacts"><?php echo $data_json; ?></textarea>

                </div>
            </div>



            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">
                        <?php _t("Import"); ?>
                    </button>
                </div>
            </div>
        </form>


        <?php
        /*
          Export:
          <a href="index.php?c=addresses&a=import_json">JSON</a>
          <a href="index.php?c=addresses&a=import_pdf">pdf</a>
         */
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

