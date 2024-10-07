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
                        <h1>Publicidad <small>Estimacion de costo</small></h1>
                    </div>


                    <h3>Posicion</h3>
                    <img src="https://www.ulyn.net/img/pub_illu2.png" alt="alt"/>
                    <form>
                        <h3>Escoja una posicion</h3>
                        <p>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Posision 1
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Posision 2
                            </label>
                        </div>
                        </p>

                        <h3>Seccion</h3>

                        <p>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Home page
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Agenda
                            </label>
                        </div>
                        </p>



                        <h3>Provicias de difusion</h3>
                        <?php
                        foreach (country_provinces_list_by_country($config_country) as $key => $province) {

                            $active = ($province['province'] == 'Pichincha') ? " active " : "";

                            echo '<div class="checkbox">
                            <label>
                                <input type="checkbox"> ' . $province['province'] . '
                            </label>
                        </div>';
                        }
                        ?>





                        <h3>Fechas</h3>



                        <div class="row">
                            <div class="col-xs-2">
                                <input type="text" class="form-control" placeholder=".col-xs-2">
                            </div>
                            <div class="col-xs-3">
                                <input type="text" class="form-control" placeholder=".col-xs-3">
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" placeholder=".col-xs-4">
                            </div>
                        </div>



                        <h3>Sus datos</h3>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>



                        <button type="submit" class="btn btn-default">Calcular</button>






                    </form>


                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>



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
        <script src="www/public_html/agenda/views/js/ie10-viewport-bug-workaround.js"></script>
        <script src="www/public_html/agenda/views/js/offcanvas.js"></script>
    </body>
</html>
