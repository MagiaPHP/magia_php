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
                        <h1>Contacto? <small>Escoje la mejor opción</small></h1>
                    </div>

                    <h3>Publicidad?</h3>
                    <p>Si deseas contratar publicidad entra primero <a href="index.php?c=public_html&a=pub">aca</a></p>



                    <h3>Trabaja con nosotros</h3>
                    <p>
                        Así que andas en busqueda de más platica, y que te hace pensar que podemos compartir con 
                        tigo todo el monton de plata que ganamos? o sera que tienes alguna super idea que 
                        nos va hacer millonario y quieres que ayudemos en ella, bueno sea como sea ya que 
                        estas por estas tierras entra <a href="index.php?c=public_html&a=job">aca</a> y alli vemos que pasa! 
                    </p>


                    <h3>Algun error, o sugerencia</h3>
                    <p>
                        Super! al programador lo tenemos encerrado en un sotano, encadenado a una silla 
                        programando estas páginas y seguro le gustara recibir algun comentario 
                        puedes enviarlo <a href="index.php?c=public_html&a=pub">aca</a>
                        así no se sentira tan solito el pobre jiji 
                    </p>

                    <h3>Cualquier otra cosa</h3>
                    <p>Ya me dio curiosidad, dime que se te ofrece? escribeme a <a href="mailto:info@eventosencuedor.com">info@eventosencuedor.com</a></p>




                </div><!--/.col-xs-12.col-sm-9-->


                <?php include view('public_html', 'sidebar'); ?>

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
