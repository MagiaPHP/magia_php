<?php include view("home", "header"); ?>  
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <?php include "nav.php"; ?>

        <div class="row">
            <div class="col-xs-0 col-sm-0 col-md-0 col-lg-0">
                <?php // include "izq_add.php"; ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <?php include "izq.php"; ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> 

                <?php
//                if ($all_items) {
//                    echo "All items";
//                }
                ?>

                <?php include "izq_edit.php"; ?>
            </div>          
        </div>


    </div>


    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">

        <?php include "part_iframe_pdf_example.php"; ?>


        <?php
        /**
         *         
          <div>

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">PDF</a></li>
          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">FPDF code</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="home">
          <?php include "part_iframe_pdf_example.php"; ?>
          </div>
          <div role="tabpanel" class="tab-pane" id="profile">
          <?php include "part_textarea_export_fpdf_format.php"; ?>
          </div>
          <div role="tabpanel" class="tab-pane" id="messages">...</div>
          <div role="tabpanel" class="tab-pane" id="settings">...</div>
          </div>

          </div>

         */
        ?>




    </div>


</div>

<?php include view("home", "footer"); ?> 

