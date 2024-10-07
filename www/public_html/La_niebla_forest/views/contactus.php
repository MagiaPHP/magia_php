


<div class="container">

    <hr class="featurette-divider">

    <div class="row">

        <div class="col-lg-4">

            <img 
                class="img-resposive" 
                src="http://lanieblaforest.com/wp-content/uploads/2019/11/logo_La_Niebla_Forest_color-300x201.png" 
                alt="Contact us" 
                width="140" 
                height="140"
                >
            <h2>Contact us</h2>

            <h3>La niebla forest</h3>



            <p>

                info@lanieblaforest.com<br>
                Europa: +32 474 62 47 07<br>
                América Latina: +593 98 380 0185<br>

            </p>


            <?php
            /* <a href="www/public_html/GestionManager/GestionManagerFlyer.pdf">Flyer</a> */
            ?>


        </div>

        <div class="col-lg-6">

            <h3>Dona, compra, participa, apoya</h3>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis velit erat,
                ullamcorper et fringilla suscipit, aliquam vel massa. Cras congue interdum leo, 
                tincidunt dapibus purus. Proin at arcu nec nisi tincidunt finibus. Sed et mauris 
                eleifend, facilisis massa nec, maximus enim. Nunc finibus lorem mi
                lacus.


            </p>


            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tu email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>


                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Apellidos</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Area</label>
                    <div class="col-sm-10">
                        <select class="form-control">
                            <?php for ($i = 1; $i <= 50; $i++) { ?>
                                <option><?php echo $i; ?> Metros que deseo protejer</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Add to our newsletter
                            </label>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                </div>
            </form>


        </div>

    </div>

    <hr class="featurette-divider">



</div>


