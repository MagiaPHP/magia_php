<?php include view("home", "header"); ?> 

<?php include view("budgets", "nav_details"); ?>




<div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8">
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>





        <div class="panel panel-default">
            <div class="panel-body">
                <h1><?php _t("Export"); ?></h1>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-body">




                <form class="form-inline">




                    <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword3">Password</label>
                        <select class="form-control" name="type">
                            <option value="json">JSON</option>
                            <option value="xml">XML</option>
                        </select>
                    </div>


                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> <?php _t("Save file"); ?>
                        </label>
                    </div>


                    <button type="submit" class="btn btn-default">Sign in</button>
                </form>


                <br>
                <br>
                <br>
                <br>




                <?php
                foreach ($budget as $key => $value) {
                    if ($key == 22) {
                        $i = 0;
                        foreach ($value[1] as $k => $v) {
                            echo "-- $i -- $k - $v<br>";
                            $i++;
                        }
                    } else {
                        echo "- $key - $value<br>";
                    }
                }



                echo vardump($budget);

                echo json_encode($budget);
                ?>
















































            </div>
        </div>



        <div class="panel panel-default">
            <div class="panel-body">                
                <h3><?php _t("Comments"); ?>: <?php // echo $budgets['comments'];     ?></h3>
            </div>
        </div>

    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php include view("budgets", "der"); ?> 
    </div>
</div>
<?php include view("home", "footer"); ?>