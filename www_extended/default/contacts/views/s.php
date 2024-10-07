<?php include view("home", "header"); ?>  
<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">        
        <?php include view("contacts", "izq_index"); ?>                  
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

        <?php //include view("contacts", "top"); ?>


        <?php
        if ($_REQUEST && $a) {
            foreach ($error as $key => $value) {
                message("warning", "$value");
            }
        }

        if (contacts_list_errors_tva()) {
            message('danger', '<a href="index.php?c=contacts&a=check_tva">It seems that there are errors, click here to correct them</a>');
        }
        ?>


        <?php
        if ((isset($smst) && $smst != false ) && (isset($smst) && $smst != false)) {
            message($smst, $smsm);
        }
        ?>



        <h1>H1</h1>

        <form>

            <div class="form-group">
                <label for="Data"><?php _t("Data"); ?></label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>



            <button type="submit" class="btn btn-default">Submit</button>
        </form>





        <?php
        //  include "nav.php";
        ?>  


        ss



    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">        
        <?php include view("contacts", "der_s"); ?>                  
    </div>


</div>
<?php include view("home", "footer"); ?>  
