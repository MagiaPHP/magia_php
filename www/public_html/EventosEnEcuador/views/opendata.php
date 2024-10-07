<!doctype html>
<html lang="en">

    <?php include "head.php"; ?>

    <body>


        <?php
        include view('public_html', 'nav');
        ?>

        <div class="container">

            <div class="row row-offcanvas row-offcanvas-right">

                <div class="col-xs-12 col-sm-9">
                    <p class="pull-right visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
                    </p>



                    <div class="page-header">
                        <h1>Opendata<small></small></h1>
                    </div>



                    <p>Pronto</p>



                </div><!--/.col-xs-12.col-sm-9-->


                <?php // include view('public_html', 'sidebar'); ?>

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
        <script src="www/public_html/agenda/views/js/ie10-viewport-bug-workaround.js"></script>
        <script src="www/public_html/agenda/views/js/offcanvas.js"></script>
    </body>
</html>
