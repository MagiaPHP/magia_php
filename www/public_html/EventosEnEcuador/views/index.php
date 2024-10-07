<!doctype html>
<html lang="en">

    <?php include "head.php"; ?>

    <body>

        <?php
        include view('public_html', 'nav');
        ?>

        <div class="container">

            <div class="row">
                <div class="jumbotron">
                    <p>          
                        <?php include "form_search.php"; ?>
                    </p>
                </div>
            </div>





            <div class="row row-offcanvas row-offcanvas-right">

                <div class="col-xs-12 col-sm-9">
                    <p class="pull-right visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">
                            <?php _t("Other provinces"); ?>
                        </button>
                    </p>
                    <div class="row">
                        <?php
                        $i = 0;

//                        vardump($agenda);

                        foreach ($agenda as $key => $event) {

                            include "agenda_item.php";
                            // include "agenda_item_carta.php";
                            // include "agenda_item_large.php";
                        }
                        ?>
                    </div><!--/row-->
                    <nav aria-label="...">
                        <ul class="pager">
                            <li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>
                            <li class="next"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>
                        </ul>
                    </nav>
                </div><!--/.col-xs-12.col-sm-9-->

                <?php
                include view('public_html', 'sidebar');
                ?>

            </div><!--/row-->

            <hr>

            <?php include view('public_html', 'footer'); ?>

        </div><!--/.container-->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="includes/jquery/3-5-1/jquery-3-5-1-min.js"><\/script>')</script>


        <script src="includes/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="www/public_html/EventosEnEcuador/views/js/ie10-viewport-bug-workaround.js"></script>
        <script src="www/public_html/EventosEnEcuador/views/js/offcanvas.js"></script>
    </body>
</html>
