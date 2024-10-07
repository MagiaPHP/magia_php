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
                        <h1>Quienes somos? <small>te gustan los secretos?</small></h1>
                    </div>

                    <p>
                        Aunque no lo creas detras de una web o cualquier sitio se encuentran personas, detras de esta pantalla 
                        escribiendo estas lineas esta un ser humano como tu dedicandole su tiempo a crear, en muchos casos 
                        es una sola persona y en otros un equipo de personas y cada una tiene una labor definida para llegar
                        a buen puerto el proyecto, y este sitio no es la exepcion.
                    </p>

                    <p>

                    </p>




                    <h3>Objetivos</h3>
                    <p>
                        El principal objetivo es contribuir con el desarrollo cultural y social brindado un acceso a la información
                        de las diferentes actividades de una forma clara 
                    </p>




                    <h3>Porque lo hacemos ?</h3>
                    <p>
                        Por que cuando busco algo nunca lo encuentro, quiero hacer alguna actividad y no hay manera de informarme, 
                        así que voila! si no hay lo que quiero, a crearlo se a dicho!!! y si de pasito se contribuye con la cultura 
                        y acceso a la infirmación que mejor ! 
                    </p>


                    <h3>Como lo hacemos?</h3>
                    <p>
                        Este sitio esta realizado con una vieja computadora con linux instalado, se usa <a href="https://www.php.net/" target="new">PHP</a> como lenguaje de programación, 
                        nuestra base de datos es <a href="https://mariadb.org/" target="new">MariaDB</a>, para que se vea bonito usamos <a href="https://getbootstrap.com/" target="new">Bootstrap</a>, 
                        la interfase para desarrollo es <a href="https://netbeans.apache.org/" target="new">Apache NetBeans 17</a>, 
                        usamos los servidores de <a href="https://ovh.com" target="new">ovh</a> para hospedar y la compra del nombre de dominio, usamos <a href="https://git-scm.com/" target="new">git</a> para
                        las versiones de nuestro sistema y <a href="https://github.com/git-ftp/git-ftp" target="new">gitftp</a> para enviarlos al servidor, y muchas horas de trabajo, ha si quieres el código fuente <a href="index.php?c=public_html&a=contact" target="new">contactame</a>
                    </p>










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
