<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-sm-12 col-md-2 col-lg-2">        
        <?php // include view("contacts", "izq_index"); ?>                  
    </div>

    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">

        <?php include view("contacts", "top"); ?>
        <?php include view("contacts", "nav"); ?>


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



        <div class="row">

            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <?php _t("My clients"); ?>
                    </div>
                    <div class="panel-body">

                        <form class="form-inline">

                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                            </div>


                            <button type="submit" class="btn btn-default">
                                <?php _t("Search"); ?>
                            </button>
                        </form>



                    </div>                   
                    <ul class="list-group">
                        <li class="list-group-item"><a href="index.php?c=contacts&a=add_company"><?php _t("Add new company"); ?></a></li>
                        <li class="list-group-item"><a href="index.php?c=contacts&a=add_company"><?php _t(" New private customer"); ?></a></li>
                        <li class="list-group-item">add new client</li>
                        <li class="list-group-item">Add invoice</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>



            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <?php _t("My providers"); ?>
                    </div>
                    <div class="panel-body">
                        <p>...</p>
                    </div>                   
                    <ul class="list-group">
                        <li class="list-group-item">Add</li>
                        <li class="list-group-item">Edit</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item"><a href="index.php?c=providers">...<?php _t("more"); ?></a></li>
                    </ul>
                </div>
            </div>


            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <?php _t("My employees"); ?>
                    </div>
                    <div class="panel-body">
                        <p>...</p>
                    </div>                   
                    <ul class="list-group">
                        <li class="list-group-item">Add</li>
                        <li class="list-group-item">Edit</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>

                        <li class="list-group-item"><a href="index.php?c=employees">...<?php _t("more"); ?></a></li>

                    </ul>
                </div>
            </div>


            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <?php _t("My providers"); ?>
                    </div>
                    <div class="panel-body">
                        <p>...</p>
                    </div>                   
                    <ul class="list-group">
                        <li class="list-group-item">Add</li>
                        <li class="list-group-item">Edit</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>




        </div>



        <div class="row">





            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <?php _t("My clients"); ?>
                    </div>
                    <div class="panel-body">

                        <form class="form-inline">

                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                            </div>


                            <button type="submit" class="btn btn-default">
                                <?php _t("Search"); ?>
                            </button>
                        </form>



                    </div>                   
                    <ul class="list-group">
                        <li class="list-group-item">Add</li>
                        <li class="list-group-item">Edit</li>
                        <li class="list-group-item">Add invoice</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>



            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <?php _t("My providers"); ?>
                    </div>
                    <div class="panel-body">
                        <p>...</p>
                    </div>                   
                    <ul class="list-group">
                        <li class="list-group-item">Add</li>
                        <li class="list-group-item">Edit</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
            </div>


            <div class="col-sm-6 col-md-3 col-lg-2">
                <div class="thumbnail">
                    <img src="..." alt="...">
                    <div class="caption">
                        <h3>
                            <?php _t("My providers"); ?>
                        </h3>

                        <form class="form-inline">
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                            </div>

                            <button type="submit" class="btn btn-default">Sign in</button>
                        </form>


                        <p>...</p>
                        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-3 col-lg-2">
                <div class="thumbnail">
                    <img src="..." alt="...">
                    <div class="caption">
                        <h3>
                            <?php _t("My employees"); ?>
                        </h3>
                        <p>...</p>
                        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                    </div>
                </div>
            </div>


        </div>



















    </div>
</div>
<?php include view("home", "footer"); ?>  
