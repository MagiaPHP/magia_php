<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("banks_lines", "izq"); ?>
    </div>



    <div class="col-sm-12 col-md-10 col-lg-10">

        <?php //include view("banks_lines", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <div class="text-center">
            <h1>
                <span class="glyphicon glyphicon-download-alt"></span>
            </h1>

            <h2>
                <?php _t("Banks"); ?>
            </h2>

            <p>
                <?php _t("You can now import your bank statements to record collections and payments"); ?>
            </p>

            <p>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#banks_import">
                    <?php _t("Click here to import"); ?>
                </button>
            </p>




            <div class="modal fade" id="banks_import" tabindex="-1" role="dialog" aria-labelledby="banks_importLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="banks_importLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">




                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>





        </div>


    </div>
</div>

<?php include view("home", "footer"); ?> 
