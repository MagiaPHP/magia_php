<?php include "header.php"; ?>

<div class="container-fluid">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">


        <div class="panel panel-default">
            <div class="panel-body">


                <div class="alert alert-success" role="alert">
                    <?php _t("Module disabled"); ?>
                </div>


                <?php
                if (isset($error)) {
                    foreach ($error as $key => $value) {
                        message("info", "$value");
                    }
                }
                ?>



                <button onclick="goBack()">Go Back</button>

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
