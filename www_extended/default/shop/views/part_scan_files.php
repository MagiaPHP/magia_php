<?php # SCAN FILESSS      ?>
<?php # SCAN FILESSS      ?>
<?php # SCAN FILESSS      ?>
<?php # SCAN FILESSS      ?>
<?php # SCAN FILESSS      ?>
<?php # SCAN FILESSS      ?>
<div class="row">

    <?php if (orders_lines_field_id_by_side("id", $id, "R")) { ?>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>
                        <?php echo _t("Files Scan list (Right Side)"); ?>
                    </b>
                </div>
                <div class="panel-body">
                    <?php
                    //include "filesListRight.php";
                    //include "modalFilesAddRightSide.php";                    
                    ?>
                    <?php
                    $side = "R";
                    include "filesList.php";
                    // include "filesListLeft.php";
                    //include "modalFilesAddLeftSide.php";
                    include "modalFilesAddSide.php";
                    ?>
                </div>
            </div>                
        </div>  
    <?php } ?>  

    <?php if (orders_lines_field_id_by_side("id", $id, "L")) { ?>
        <div class="col-sm-12 col-md-6 col-lg-6"></div>
        <div class="col-sm-12 col-md-6 col-lg-6">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>
                        <?php echo _t("Files Scan list (Left Side)"); ?>
                    </b>
                </div>
                <div class="panel-body">
                    <?php
                    $side = "L";
                    include "filesList.php";
                    // include "filesListLeft.php";
                    //include "modalFilesAddLeftSide.php";
                    include "modalFilesAddSide.php";
                    ?>
                </div>
            </div>

        </div>
    <?php } ?>           



    <?php if (orders_lines_field_id_by_side("id", $id, "S")) { ?>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>
                        <?php echo _t("Files Scan list STEREO"); ?>
                    </b>
                </div>
                <div class="panel-body">
                    <?php
                    //include "filesListStereo.php";
                    //include "modalFilesAddStereoSide.php";
                    ?>

                    <?php
                    $side = "S";
                    include "filesList.php";
                    // include "filesListLeft.php";
                    //include "modalFilesAddLeftSide.php";
                    include "modalFilesAddSide.php";
                    ?>


                </div>
            </div>                
        </div>  
    <?php } ?>  

</div>

