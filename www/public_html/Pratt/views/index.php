<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Pratt</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicons -->
        <link href="www/public_html/Pratt/views/img/favicon.png" rel="icon">
        <link href="www/public_html/Pratt/views/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic|Raleway:400,300,700" rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="www/public_html/Pratt/views/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="www/public_html/Pratt/views/css/style.css" rel="stylesheet">

        <?php
        /*  <!-- =======================================================
          Template Name: Pratt
          Template URL: https://templatemag.com/pratt-app-landing-page-template/
          Author: TemplateMag.com
          License: https://templatemag.com/license/
          ======================================================= --> */
        ?>
    </head>

    <body data-spy="scroll" data-offset="0" data-target="#navigation">

        <!-- Fixed navbar -->
        <div id="navigation" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand smothscroll" href="#home"><b><?php echo $config_company_name; ?></b></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#home" class="smothscroll">Home</a></li>
                        <li><a href="#desc" class="smothscroll">Description</a></li>
                        <li><a href="#showcase" class="smothscroll">Showcase</a></li>
                        <li><a href="#contact" class="smothscroll">Contact</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>

        <section id="home" name="home">
            <div id="headerwrap">
                <div class="container">
                    <div class="row centered">
                        <div class="col-lg-12">
                            <h1>Welcome To <b><?php echo $config_company_name; ?></b></h1>
                            <h3>Show your product with this handsome theme.</h3>
                            <br>
                        </div>

                        <div class="col-lg-2">
                            <h5>Amazing Results</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <img class="hidden-xs hidden-sm hidden-md" src="www/public_html/Pratt/views/img/arrow1.png">
                        </div>
                        <div class="col-lg-8">
                            <img class="img-responsive" src="www/public_html/Pratt/views/img/app-bg.png" alt="">
                        </div>
                        <div class="col-lg-2">
                            <br>
                            <img class="hidden-xs hidden-sm hidden-md" src="www/public_html/Pratt/views/img/arrow2.png">
                            <h5>Awesome Design</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                </div>
                <!--/ .container -->
            </div>
            <!--/ #headerwrap -->
        </section>


        <section id="desc" name="desc">
            <!-- INTRO WRAP -->
            <div id="intro">
                <div class="container">
                    <div class="row centered">
                        <h1>Designed To Excel</h1>
                        <br>
                        <br>
                        <div class="col-lg-4">
                            <img src="www/public_html/Pratt/views/img/intro01.png" alt="">
                            <h3>Community</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <div class="col-lg-4">
                            <img src="www/public_html/Pratt/views/img/intro02.png" alt="">
                            <h3>Schedule</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <div class="col-lg-4">
                            <img src="www/public_html/Pratt/views/img/intro03.png" alt="">
                            <h3>Monitoring</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                    <br>
                    <hr>
                </div>
                <!--/ .container -->
            </div>
            <!--/ #introwrap -->

            <!-- FEATURES WRAP -->
            <div id="features">
                <div class="container">
                    <div class="row">
                        <h1 class="centered">What's New?</h1>
                        <br>
                        <br>
                        <div class="col-lg-6 centered">
                            <img class="centered" src="www/public_html/Pratt/views/img/mobile.png" alt="">
                        </div>

                        <div class="col-lg-6">
                            <h3>Some Features</h3>
                            <br>
                            <!-- ACCORDION -->
                            <div class="accordion ac" id="accordion2">
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                            First Class Design
                                        </a>
                                    </div>
                                    <!-- /accordion-heading -->
                                    <div id="collapseOne" class="accordion-body collapse in">
                                        <div class="accordion-inner">
                                            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                                                with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                        <!-- /accordion-inner -->
                                    </div>
                                    <!-- /collapse -->
                                </div>
                                <!-- /accordion-group -->
                                <br>

                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">Retina Ready Theme</a>
                                    </div>
                                    <div id="collapseTwo" class="accordion-body collapse">
                                        <div class="accordion-inner">
                                            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                                                with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                        <!-- /accordion-inner -->
                                    </div>
                                    <!-- /collapse -->
                                </div>
                                <!-- /accordion-group -->
                                <br>

                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">Awesome Support</a>
                                    </div>
                                    <div id="collapseThree" class="accordion-body collapse">
                                        <div class="accordion-inner">
                                            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                                                with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                        <!-- /accordion-inner -->
                                    </div>
                                    <!-- /collapse -->
                                </div>
                                <!-- /accordion-group -->
                                <br>

                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">Responsive Design</a>
                                    </div>
                                    <div id="collapseFour" class="accordion-body collapse">
                                        <div class="accordion-inner">
                                            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                                                with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                        <!-- /accordion-inner -->
                                    </div>
                                    <!-- /collapse -->
                                </div>
                                <!-- /accordion-group -->
                                <br>
                            </div>
                            <!-- Accordion -->
                        </div>
                    </div>
                </div>
                <!--/ .container -->
            </div>
            <!--/ #features -->
        </section>


        <section id="showcase" name="showcase">
            <div id="showcase">
                <div class="container">
                    <div class="row">
                        <h1 class="centered">Some Screenshots</h1>
                        <br>
                        <div class="col-lg-8 col-lg-offset-2">
                            <div id="carousel-example-generic" class="carousel slide">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="www/public_html/Pratt/views/img/item-01.png" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="www/public_html/Pratt/views/img/item-02.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
                <!-- /container -->
            </div>
        </section>


        <section id="contact" name="contact">
            <div id="footerwrap">
                <div class="container">
                    <div class="col-lg-5">

                        <h3><?php echo $config_company_name; ?></h3>


                        <p>
                            Av. Greenville 987,<br/> New York,<br/> 90873
                            <br/> United States
                        </p>



                    </div>

                    <div class="col-lg-7">
                        <h3>Contact us</h3>

                        <br>

                        <?php
                        /*          <form class="contact-form php-mail-form" role="form" action="contactform/contactform.php" method="POST">

                          <div class="form-group">
                          <label for="contact-name">Your Name</label>
                          <input type="name" name="name" class="form-control" id="contact-name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                          <div class="validate"></div>
                          </div>
                          <div class="form-group">
                          <label for="contact-email">Your Email</label>
                          <input type="email" name="email" class="form-control" id="contact-email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                          <div class="validate"></div>
                          </div>
                          <div class="form-group">
                          <label for="contact-subject">Subject</label>
                          <input type="text" name="subject" class="form-control" id="contact-subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                          <div class="validate"></div>
                          </div>

                          <div class="form-group">
                          <label for="contact-message">Your Message</label>
                          <textarea class="form-control" name="message" id="contact-message" placeholder="Your Message" rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
                          <div class="validate"></div>
                          </div>

                          <div class="loading"></div>
                          <div class="error-message"></div>
                          <div class="sent-message">Your message has been sent. Thank you!</div>

                          <div class="form-send">
                          <button type="submit" class="btn btn-large">Send Message</button>
                          </div>

                          </form> */
                        ?>

                    </div>
                </div>
            </div>
        </section>
        <div id="copyrights">
            <div class="container">
                <p>
                    &copy; Copyrights <strong><?php echo $config_company_name; ?></strong>. All Rights Reserved 
                </p>


                <form class=" form-horizontal form-signin" method="post" >
                    <input type="hidden" name="c" value="users">
                    <input type="hidden" name="a" value="identification">   




                    <div class="form-group">
                        <label for="login" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="login" name="login" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Sign in</button>
                        </div>
                    </div>
                </form>




                <div class="credits">

                    <?php
                    /*        <!--
                      You are NOT allowed to delete the credit link to TemplateMag with free version.
                      You can delete the credit link only if you bought the pro version.
                      Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/pratt-app-landing-page-template/
                      Licensing information: https://templatemag.com/license/
                      -->
                      Created with Pratt template by <a href="https://templatemag.com/">TemplateMag</a> */
                    ?>


                </div>


            </div>
        </div>

        <!-- JavaScript Libraries -->
        <script src="www/public_html/Pratt/views/lib/jquery/jquery.min.js"></script>
        <script src="www/public_html/Pratt/views/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="www/public_html/Pratt/views/lib/php-mail-form/validate.js"></script>
        <script src="www/public_html/Pratt/views/lib/easing/easing.min.js"></script>

        <!-- Template Main Javascript File -->
        <script src="www/public_html/Pratt/views/js/main.js"></script>

    </body>
</html>
