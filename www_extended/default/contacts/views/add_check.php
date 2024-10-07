<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php // include "izq_edit.php"; ?>

    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">

        <?php
        if ($error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1>
            <?php _t("Add check"); ?>
        </h1>



        <form class="form-horizontal">


            <div class="form-group">
                <label for="name" class="col-sm-2 control-label"><?php _t("Company name"); ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="" value="">
                </div>
            </div>



            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
            </div>
        </form>


















    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php // include "www/contacts/views/der_edit.php";   ?>
    </div>
</div>


<?php include view("home", "footer"); ?>  

