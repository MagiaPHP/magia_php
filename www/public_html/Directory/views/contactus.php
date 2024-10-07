<div class="container">

    <hr class="featurette-divider">

    <div class="row">
        <div class="col-lg-4">
            <h2>Company name</h2>


            <dl>
                <dt>Nuestra web</dt>
                <dd>- Nosotros</dd>
                <dd>- Logos e imagenes</dd>
                <dd>- Sistema de facturacion</dd>
                <dt>Exras</dt>
                <dd>- politica de privacidad</dd>
                <dd>- Servicio al cliente</dd>
                <dd>- Sistema</dd>
            </dl>



        </div>

        <div class="col-lg-4">

            <h3><?php echo $config_company_name; ?></h3>
            <p>
                <?php echo $config_company_email; ?><br>
                <?php echo $config_company_tel; ?><br>
                <br> 
            </p>


            <dl>
                <dt>Redes sociles</dt>
                <dd>- Youtube</dd>
                <dd>- Facebook</dd>
                <dd>- Instagram</dd>
                <dd>- Twiter</dd>

            </dl>



            <?php
            /* <a href="www/public_html/GestionManager/GestionManagerFlyer.pdf">Flyer</a> */
            ?>


        </div>

        <div class="col-lg-4">


            <h3>Login </h3>
            <form class="" method="post" action="index.php">

                <input type="hidden" name="c" value="users">
                <input type="hidden" name="a" value="identification">  


                <div class="form-group">
                    <input type="text" name="login" placeholder="Email" class="form-control">
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
            </form>
            <br>
            <br>
            <br>

            <dl>
                <dt>Sistema</dt>
                <dd>- Olvido su clave?</dd>
                <dd>- Abrir una cuenta</dd>



            </dl>



        </div>




    </div>

    <hr class="featurette-divider">



</div>


