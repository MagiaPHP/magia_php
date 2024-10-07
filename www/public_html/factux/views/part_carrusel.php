<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>


    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <?php /* <img class="first-slide" src="https://picsum.photos/1990/500" alt="First slide"> */ ?>
            <img class="first-slide" src="www/public_html/GestionMedical/views/img/GestionMedical1.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1><?php echo $config_company_name; ?></h1>
                    <p>
                        Sistema para la gestión de instituciones sanitarias
                    </p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#factux_registre">
                        <?php _t("Registre"); ?>
                    </button>                            
                </div>
            </div>
        </div>


        <div class="item">
            <img class="first-slide" src="www/public_html/GestionMedical/views/img/GestionMedical2.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Gestión de pacientes.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>


        <div class="item">
            <img class="first-slide" src="www/public_html/GestionMedical/views/img/GestionMedical3.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Gestión de citas.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>


        <div class="item">
            <img class="first-slide" src="www/public_html/GestionMedical/views/img/GestionMedical4.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Gestión de bodega / Farmacia.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>


        <div class="item">
            <img class="first-slide" src="www/public_html/GestionMedical/views/img/GestionMedical5.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Gestión de oficinas.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>


        <div class="item">
            <img class="first-slide" src="www/public_html/GestionMedical/views/img/GestionMedical6.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Pequeñas y grandes instituciones.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>




    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->
