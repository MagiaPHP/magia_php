<?php include "header.php"; ?>


<div class="container-fluid">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="alert alert-success" role="alert">
                    <?php _t("Error"); ?>
                </div>
                <?php
                if (isset($error)) {
                    foreach ($error as $key => $value) {
                        message("info", "$value");
                    }
                }
                ?>




                <button class="btn btn-primary" onclick="goBack()">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <?php _t("Go Back"); ?>
                </button>




                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script> 
            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
</div>

<?php include "footer.php"; ?>
