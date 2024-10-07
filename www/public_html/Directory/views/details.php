<!doctype html>
<html lang="en">
    <head>
        <?php include "head.php"; ?>
    </head>

    <body>
        <div class="navbar-wrapper">
            <div class="container">

                <?php //include "nav.php"; ?>

            </div>
        </div>

        <?php //include "carrusel.php"; ?>


        <div class="container marketing">

            <?php //vardump($contact);?>
            <?php //vardump($contact->getDirectory('Tel'));?>
            <?php //vardump($contact->getAddresses('Billing')->getAddress());?>


            <?php ?>

            <img src="www/gallery/img/_web_93/users/<?php echo user_options('contacts_picture', $contact->getId()); ?>">




            <h1><?php echo $contact->getName(); ?></h1>
            <h3>Category</h3>
            <h5><?php _t('Vat'); ?>: <?php echo $contact->getTva(); ?></h5>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vitae felis nibh. Aliquam erat volutpat. Sed facilisis quam urna, vitae interdum est luctus id. Nunc congue, felis id eleifend tempus, nisi massa vulputate leo, nec posuere neque urna ut nisi. Suspendisse bibendum libero id dolor venenatis rhoncus. Praesent sodales viverra nisl in tincidunt. Praesent pulvinar tempus leo in tristique. Vivamus interdum felis erat, non sagittis lacus volutpat id. Nullam non magna in sapien posuere suscipit. In aliquam elementum dui, sed laoreet dui eleifend consequat. Aenean quis vestibulum velit.
            </p><p>
                Suspendisse et varius est. Aliquam vitae quam vel dolor laoreet molestie ut sit amet risus. In porttitor lorem non sem porttitor, eu tempus sapien ullamcorper. Donec sollicitudin euismod ante, eu laoreet sapien efficitur ac. Quisque at vehicula tellus. Suspendisse leo turpis, bibendum eget turpis at, sodales vehicula ligula. Sed ut est vel nisi bibendum dapibus. Aliquam pellentesque felis a ipsum pulvinar posuere. Nullam sodales mollis libero. Suspendisse vulputate at mi quis euismod. Suspendisse lacinia, felis ac pulvinar egestas, eros felis porta mauris, at imperdiet neque ex vulputate lorem.
            </p><p>
                Phasellus blandit justo semper augue luctus, eu maximus lacus gravida. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Proin blandit ligula a nibh efficitur commodo. Praesent eu mauris euismod, placerat enim vitae, aliquam elit. Duis convallis viverra imperdiet. Pellentesque commodo ultricies tempus. Curabitur a nisl eget sapien ultrices mattis. Curabitur feugiat vulputate ipsum nec porta. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc at dolor nec orci lobortis accumsan tempor sit amet lorem. In ac mauris eget ex cursus varius.
            </p><p>
                Vestibulum sit amet sem urna. Quisque eu nulla massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet vitae lorem non semper. Praesent tortor tortor, consectetur eu lacus nec, vulputate congue lectus. Quisque nunc dolor, lobortis eu massa eget, pretium sollicitudin elit. Fusce non metus in mi sollicitudin pulvinar. Curabitur vitae iaculis diam. Ut pharetra mollis convallis. Vestibulum porttitor, est non accumsan ultrices, justo lorem rhoncus erat, sed luctus diam orci sit amet augue. Aliquam et dolor justo. Morbi facilisis quam metus, ac euismod urna iaculis ut. Fusce suscipit dolor ac erat euismod sodales. Aliquam pretium iaculis diam, id lacinia tortor rutrum id.
            </p><p>
                Quisque faucibus diam et rutrum commodo. Nullam eros mi, aliquet convallis rutrum ac, ultrices in nunc. Nunc pretium vel justo vestibulum placerat. Maecenas arcu tortor, pellentesque ut efficitur ut, faucibus tempus erat. Nulla efficitur neque venenatis dui lacinia, sit amet tincidunt felis imperdiet. Sed non fringilla sem, ut blandit purus. Duis varius hendrerit mi, sit amet ornare metus molestie non. Donec condimentum elit nec luctus eleifend.
            </p>

            <hr>


            <h3>
                <?php _t("Services"); ?>
            </h3>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vitae felis nibh. Aliquam erat volutpat. Sed facilisis quam urna, vitae interdum est luctus id. Nunc congue, felis id eleifend tempus, nisi massa vulputate leo, nec posuere neque urna ut nisi. Suspendisse bibendum libero id dolor venenatis rhoncus. Praesent sodales viverra nisl in tincidunt. Praesent pulvinar tempus leo in tristique. Vivamus interdum felis erat, non sagittis lacus volutpat id. Nullam non magna in sapien posuere suscipit. In aliquam elementum dui, sed laoreet dui eleifend consequat. Aenean quis vestibulum velit.
            </p>

            <p>
                Suspendisse et varius est. Aliquam vitae quam vel dolor laoreet molestie ut sit amet risus. In porttitor lorem non sem porttitor, eu tempus sapien ullamcorper. Donec sollicitudin euismod ante, eu laoreet sapien efficitur ac. Quisque at vehicula tellus. Suspendisse leo turpis, bibendum eget turpis at, sodales vehicula ligula. Sed ut est vel nisi bibendum dapibus. Aliquam pellentesque felis a ipsum pulvinar posuere. Nullam sodales mollis libero. Suspendisse vulputate at mi quis euismod. Suspendisse lacinia, felis ac pulvinar egestas, eros felis porta mauris, at imperdiet neque ex vulputate lorem.
            </p>


            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                <?php _t("Ask budget"); ?>
            </button>




            <hr>

            <h3>
                <?php _t("Horario"); ?>
            </h3>


            <table class="table table-condensed">
                <tr>
                    <td>Lunes</td>
                    <td>08h00 - 12h00</td>
                    <td>13h30 - 17h00</td>
                </tr>


                <tr>
                    <td>Martes</td>
                    <td>08h00 - 12h00</td>
                    <td>13h30 - 17h00</td>
                </tr>


                <tr>
                    <td>Miercoles</td>
                    <td>08h00 - 12h00</td>
                    <td>13h30 - 17h00</td>
                </tr>


                <tr>
                    <td>Jueves</td>
                    <td>08h00 - 12h00</td>
                    <td>13h30 - 17h00</td>
                </tr>


                <tr>
                    <td>Viernes</td>
                    <td>08h00 - 12h00</td>
                    <td>13h30 - 17h00</td>
                </tr>


                <tr>
                    <td>Sabado</td>
                    <td>08h00 - 12h00</td>
                    <td>13h30 - 17h00</td>
                </tr>


                <tr>
                    <td>Dominco</td>
                    <td>08h00 - 12h00</td>
                    <td>Cerrado</td>
                </tr>



            </table>








            <hr>



            <h3>
                <?php _t("Contact"); ?>
            </h3>

            <p>Empresa ABC</p>
            <p>Robinson Coello</p>
            <p><?php _t("Tel"); ?>: <?php echo $contact->getDirectory('Tel'); ?></p>
            <p>



                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                    <?php _t("Send email"); ?>
                </button>



                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                    <?php _t("Ask budget"); ?>
                </button>



                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                    <?php _t("Send comments"); ?>
                </button>



                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                    <?php _t("Send a friend"); ?>
                </button>






                <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><?php _t("Send email"); ?></h4>
                        </div>
                        <div class="modal-body">


                            <form class="form-horizontal">


                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Su nombre</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="message" class="col-sm-2 control-label"><?php _t("Message"); ?></label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="message" id="message"></textarea>    

                                    </div>
                                </div>





                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">Sign in</button>
                                    </div>
                                </div>
                            </form>




                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div></p>






        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d2539.159656648686!2d4.4770338!3d50.4753714!3m2!1i1024!2i768!4f13.1!3m2!1m1!1s0x47c229205b204cdd%3A0x763fdbbeccf05950!5e0!3m2!1sfr!2sbe!4v1653547592991!5m2!1sfr!2sbe" 
            width="100%" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"
            >

        </iframe>




    </div><!-- /.container -->

    <?php //include "marketing.php"; ?>
    <?php include "footer.php"; ?>

</body>
</html>


