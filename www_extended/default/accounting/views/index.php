<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("accounting", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php include view("accounting", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <div class="row">


            <div class="col-sm-6 col-md-4">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <?php _t("Budgets"); ?>
                    </div>
                    <div class="panel-body">
                        <p>
                            Explicacion de una cosa
                        </p>
                    </div>

                    <!-- Table -->
                    <table class="table">
                        <tr>
                            <th>1</th>
                            <th>12</th>
                            <th>123</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                    </table>
                </div>
            </div>


            <div class="col-sm-6 col-md-4">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <?php _t("Sales invoices"); ?>
                    </div>
                    <div class="panel-body">
                        <p>
                            Explicacion de una cosa
                        </p>
                    </div>

                    <!-- Table -->
                    <table class="table">
                        <tr>
                            <th>1</th>
                            <th>12</th>
                            <th>123</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                    </table>
                </div>
            </div>


        </div>














    </div>
</div>

<?php include view("home", "footer"); ?> 
