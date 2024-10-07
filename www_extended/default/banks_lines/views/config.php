<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("banks_lines", "izq"); ?>
    </div>



    <div class="col-sm-12 col-md-10 col-lg-10">

        <?php //include view("banks_lines", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <h1><?php _t("Config"); ?></h1>


        <table class="table table-bordered">

            <tr>
                <td>1</td>
                <td>Cantidad max de lineas permitidas al cargar un archo csv </td>
                <td>
                    <form class="form-inline">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail3">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword3">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Sign in</button>
                    </form>

                </td>
            </tr>


        </table>


    </div>
</div>

<?php include view("home", "footer"); ?> 
