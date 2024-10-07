<?php include view("home", "header"); ?> 

<?php include "nav_details.php"; ?>

<div class="row">

    <div class="col-sm-0">
        <?php // include "izq.php"; ?> 
    </div>


    <div class="col-sm-6 col-md-6 col-lg-6">





        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home1" aria-controls="home1" role="tab" data-toggle="tab">Invoice</a></li>
                <li role="presentation"><a href="#profile1" aria-controls="profile1" role="tab" data-toggle="tab">json</a></li>
                <li role="presentation"><a href="#messages1" aria-controls="messages1" role="tab" data-toggle="tab">array</a></li>
                <li role="presentation"><a href="#settings1" aria-controls="settings1" role="tab" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home1">
                    <?php vardump($inv); ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile1">
                    <?php vardump(json_encode($inv)); ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="messages1">
                    <?php vardump(json_decode(json_encode($inv)), true); ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="settings1">
                    <?php vardump($inv); ?>
                </div>
            </div>
        </div>






    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">
        <?php include "der_export_xml.php"; ?> 
    </div>
</div>







<?php include view("home", "footer"); ?>