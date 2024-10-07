<footer>


    <div class="row">

        <div class="col-md-3">
            <p>&copy; <?php echo date('Y'); ?>. <?php echo $config_company_name; ?></p>

            <?php
            // <img src="https://picsum.photos/200/100" alt="alt"/>
            echo logo();
            ?>



        </div>



        <div class="col-md-2">

            <div class="list-group">



            </div>
        </div>
        <div class="col-md-2">

            <p><a href="index.php"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo _t("Home"); ?></a></p>
            <p><a href="index.php#"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo _t("Login"); ?></a></p>
            <p><a href="index.php#"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo _t("Newsletter"); ?></a></p>
            <p><a href="index.php#"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo _t("Registre a event"); ?></a></p>
            <p><a href="index.php#"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo _t("Desincripción"); ?></a></p>

        </div>
        <div class="col-md-2">

            <p><a href="index.php?c=public_html&a=contact"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo _t("Contact"); ?></a></p>
            <p><a href="index.php?c=public_html&a=about"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo _t("About us"); ?></a></p>

            <p><a href="index.php?c=public_html&a=pub"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo _t("Pub"); ?></a></p>
            <p><a href="index.php?c=public_html&a=conditions"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo _t("Conditions"); ?></a></p>
            <p><a href="index.php?c=public_html&a=cookies"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo _t("Cookies"); ?></a></p>
            <p><a href="index.php?c=public_html&a=opendata"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo _t("Open data"); ?></a></p>
            <p><a href="index.php?c=public_html&a=job"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo _t("Jobs"); ?></a></p>

        </div>


        <div class="col-md-3">

            <?php
            /**
             * https://developers.google.com/identity/one-tap/android/get-started?hl=fr
             */
            ?>
            <form method="post" action="index.php">
                <input type="hidden" name="c" value="users">
                <input type="hidden" name="a" value="identification">   

                <div class="form-group">
                    <label for="login"><?php _t("Username"); ?></label>
                    <input type="text" name="login" class="form-control" id="login" placeholder="login">
                </div>

                <div class="form-group">
                    <label for="password"><?php _t("Password"); ?></label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="password">
                </div>

                <button type="submit" class="btn btn-default"><?php _t("Go"); ?></button>
            </form>
        </div>



    </div>

    <br>
    <br>
    <br>
    <br>


    <div class="row">

        <div class="col-md-3">

            <h4>
                <?php _t("Changer province"); ?>
            </h4>


            <?php
            foreach (country_provinces_list_by_country($config_country) as $province) {
                // si es pichincha
                $active = ($province['province'] == 'Pichincha') ? " active " : "";
                echo '<a href="http://eventos-en-' . strtolower(url_amigable($province['province'])) . '.' . $config_company_domain_name . '" class="">Eventos en ' . $province['province'] . '</a><br>';
            }
            ?>
        </div>



        <div class="col-md-3">
            <h4>
                <?php _t("Categories"); ?>
            </h4>

            <?php
            foreach (agenda_categories_list() as $category) {
                echo '<a href="index.php?c=public_html&a=search&w=by_category_id&category_id=' . $category['id'] . '">' . $category['category'] . '</a><br>';
            }
            ?>



        </div>
        <div class="col-md-3">


        </div>
        <div class="col-md-3">



        </div>





    </div>


</footer>


