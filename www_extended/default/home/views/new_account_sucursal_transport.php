<?php include "header.php"; ?>

<p class="text-center">
    <?php logo(200, "img-responsive"); ?>
</p>

<hr>

<div class="container-fluid">
    <div class="col-lg-4">
        <?php include "izq_new.php"; ?>
    </div>
    <div class="col-lg-8">

        <h1>
            <?php _t("Transport"); ?>
        </h1>

        <p>
            <?php _t("You must choose a transport company that will be used to deliver the packages"); ?>
        </p>



        <p>
            <?php message('danger', $mensaje); ?>
        </p>


        <div class="row">
            <?php foreach (transport_list() as $key => $transport) { ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="<?php echo $transport['code']; ?>.png" alt="...">
                        <div class="caption">
                            <h3><?php echo $transport["name"]; ?></h3>
                            <p>
                                <a href="#" class="btn btn-primary" role="button"><?php echo "Select"; ?></a> 
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>






        <?php // ------------------------------------------------------------ ?>
        <hr>
        <a href="index.php?c=home&a=new_account_sucursal_users" class="btn btn-primary"><?php _t("Next"); ?></a>









    </div>
    <div class="col-lg-4"></div>
</div>




<?php include "footer.php"; ?>
