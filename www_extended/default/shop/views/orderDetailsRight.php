
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
        <?php include "formOrejaLeftdetails.php"; ?>                                   
    </div>            
    <div class="col-sm-12 col-md-6 col-lg-6">
        <?php include "formOrejaRigthDetails.php"; ?>                     
    </div>
</div>


<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <b>
                    <?php echo _t("Files Scan list (Left Side)"); ?>
                </b>
            </div>
            <div class="panel-body">
                <?php include "filesListLeft.php"; ?>
                <?php include "modalFilesAddLeftSide.php"; ?>
            </div>
        </div>                                            
    </div>


    <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>
                    <?php echo _t("Files Scan list (Right Side)"); ?>
                </b>
            </div>
            <div class="panel-body">
                <?php include "filesListRight.php"; ?>
                <?php include "modalFilesAddRightSide.php"; ?>
            </div>
        </div>                
    </div>                          
</div>




