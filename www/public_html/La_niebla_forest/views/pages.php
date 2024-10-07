<div class="container marketing">

    <?php foreach (blog_list() as $key => $blog_post) { ?>
        <div class="row featurette">
            <hr class="featurette-divider">

            <div class="col-md-7">
                <h2 class="featurette-heading">
                    <a href="index.php?c=w&a=details&id=<?php echo $blog_post['id']; ?>">
                        <?php echo $blog_post['title']; ?> 
                    </a>
                    <span class="text-muted">o cualquier institución sanitaria.</span>
                </h2>

                <p class="lead">
                    <?php echo substr($blog_post['body'], 0, 350); ?>
                </p>
                <p class="lead">
                </p>            
            </div>

            <div class="col-md-5 vertical-center" >
                <img 
                    class="featurette-image img-resposive center-block" 
                    src="www/public_html/GestionMedical/views/img/gestionMedical.jpg" width="300"
                    data-src="" 
                    alt="Generic placeholder image"
                    >
            </div>


        </div>

    <?php } ?>





    <hr class="featurette-divider">



    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">Sistema el cloud, <span class="text-muted">24/365</span></h2>
            <p class="lead">

                Disponibilidad de acceso 24 horas al día, 365 días al año, puede ingresar a el desde cualquier dispositivo 

            </p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-responsive center-block" 
                 src="https://picsum.photos/450/302"
                 data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
    </div>


    <hr class="featurette-divider">



    <!-- /END THE FEATURETTES -->


    <!-- FOOTER -->
    <footer>





        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2016 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>

</div><!-- /.container -->
