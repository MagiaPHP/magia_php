<?php include "header.php"; ?>  

<?php include "nav.php"; ?>

<div class="container">
    <hr>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <?php include "izq_search.php"; ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <hr>
            <?php
            if ($_REQUEST) {
                foreach ($error as $key => $value) {
                    message("info", "$value");
                }
            }
            ?>


            <div class="well">
                <form class="form-inline">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword3">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">
                        <?php _t("Search"); ?>
                    </button>
                </form>
            </div>


            <?php
            include "items.php";
            ?>

        </div>
        <div class="col-xs-0 col-sm-0 col-md-0 col-lg-0">
            <?php //include "der_index.php"; ?>
        </div>
    </div>
</div>

<?php include ("footer.php"); ?> 

