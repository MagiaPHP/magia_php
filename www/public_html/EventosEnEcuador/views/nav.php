<p class="text-center">
    Sitio en desarrollo, !!!
</p>


<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Eventos en <?php echo $config_province; ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php?c=public_html"><?php _t("Home"); ?></a></li>
                <li><a href="index.php?c=public_html&a=about"><?php _t("About us"); ?></a></li>
                <li><a href="index.php?c=public_html&a=contact"><?php _t("Contact"); ?></a></li>
                <li><a href="http://localhost/jiho_42/index.php?c=public_html"><?php _t("Pichincha"); ?></a></li>
                <li><a href="http://127.0.0.1/jiho_42/index.php?c=public_html"><?php _t("Guayas"); ?></a></li>
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->