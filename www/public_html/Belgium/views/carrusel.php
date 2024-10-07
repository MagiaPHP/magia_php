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
            <img class="first-slide" src="www/public_html/3dfast/views/img/1.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1><?php echo $config_company_name; ?></h1>
                    <p>
                        <?php echo $config_company_slogan; ?>
                    </p>
                    <p>


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                            Sign up now
                        </button>



                    </p>
                </div>
            </div>
        </div>


        <div class="item">
            <img class="first-slide" src="www/public_html/3dfast/views/img/2.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Gestión de pacientes.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                        Sign up now
                    </button>
                </div>
            </div>
        </div>


        <div class="item">
            <img class="first-slide" src="www/public_html/3dfast/views/img/3.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Gestión de citas.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                        Sign up now
                    </button>
                </div>
            </div>
        </div>


        <div class="item">
            <img class="first-slide" src="www/public_html/3dfast/views/img/4.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Gestión de bodega / Farmacia.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>


        <div class="item">
            <img class="first-slide" src="www/public_html/3dfast/views/img/5.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Gestión de oficinas.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                        Sign up now
                    </button>
                </div>
            </div>
        </div>


        <div class="item">
            <img class="first-slide" src="www/public_html/3dfast/views/img/6.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Pequeñas y grandes instituciones.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                        Sign up now
                    </button>
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





<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    Registre now
                </h4>
            </div>
            <div class="modal-body">






                <form>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Company name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Audio SA">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Tax number</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="BE123.698.258">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="info@audio.com">
                    </div>



                    <div class="form-group">
                        <label for="exampleInputEmail1">Invitation code</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="2525">
                    </div>






                </form>










            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>
</div>