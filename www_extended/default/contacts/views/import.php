<?php include view("home", "header"); ?>  
<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">        
        <?php
        //include "izq.php" ;
//        if ( contacts_field_id("type" , $id) == 1 ) { // si es una compani
//            include "izq_details_company.php" ;
//        } else {
//            include "izq_details_contact.php" ;
//        }
        ?>                    
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12">
        <?php
        if ($_REQUEST && $a) {
            foreach ($error as $key => $value) {
                message("warning", "$value");
            }
        }
        ?>
        <?php
        if ((isset($smst) && $smst != false ) && (isset($smst) && $smst != false)) {
            message($smst, $smsm);
        }
        ?>








        <form>


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





















        <?php //include "nav.php"; ?>  

        <?php include "table_import.php"; ?>

        <?php
        /*        <a href="index.php?c=contacts&a=export_csv">Export</a> */
        ?>

        <?php
        // $pagination->createHtml();
//        pagination("index.php?c=$c", $totalItems , $itemsByPage , $page); 
        ?>


    </div>
</div>
<?php include view("home", "footer"); ?>  
