<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">

        <?php
        $i = 1;
        foreach (blog_search_by('status', 1) as $key => $blog_list_item) {
            $blog = new Blog();
            $blog->setBlog($blog_list_item['id']);

            echo '<div class="col-lg-4">
            <img 
                class="img-circle" 
                src="https://picsum.photos/140/14' . $i++ . '" 
                alt="Generic placeholder image" width="140" height="140">
            <h2> ' . $blog->getTitle() . '</h2>
            <p>
                ' . clean(substr($blog->getDescription(), 0, 150)) . '
            </p>
            <p><a class="btn btn-default" href="index.php?c=public_html&a=details&id=' . $blog->getId() . '" role="button">' . _tr("Read") . '</a></p>
        </div>';
        }


//        vardump(_options_option('config_public_html_theme')); 
        ?>        
    </div><!-- /.row -->


    <?php
    /**
     * 
      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
      <div class="col-md-7">
      <h2 class="featurette-heading">
      Delivering success. <span class="text-muted">Delivering success with every solution..</span></h2>
      <p class="lead">
      I work with small and medium sized businesses of all kinds to develop websites that set them apart from their competition. My sites tend to focus on simplicity and utilize generous whitespace, creative typography, and beautiful imagery. You can find some examples of the work I’ve done on my portfolio page.</p>

      ​

      ​
      <p class="lead">

      </p>
      ​
      <p class="lead">
      My skills include: sales, HTML, CSS, PHP, marketing, programming, web design, Adobe Photoshop, accounting, customer service, and all other responsibilities of a business owner.   I’ve written advanced algorithms for social sites and produced some of the best work on the market!
      </p>
      </div>

      <div class="col-md-5 vertical-center" >



      <img
      class="featurette-image img-resposive center-block"
      src="https://picsum.photos/600/601"
      data-src="https://static.wixstatic.com/media/85c63d_6b8a4fde4347498fa1914895b3d3989d~mv2.jpg/v1/fill/w_782,h_754,al_r,q_85,usm_0.66_1.00_0.01/85c63d_6b8a4fde4347498fa1914895b3d3989d~mv2.webp"
      alt="Generic placeholder image"

      >

      </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
      <div class="col-md-7 col-md-push-5">
      <h2 class="featurette-heading">Let’s discuss
      <span class="text-muted">about you project!</span>
      </h2>

      <p class="lead">
      THE PROFESSIONAL SOURCE FOR CREATIVE VISUAL MEDIA
      </p>



      <p class="lead">
      If you are looking to create a website, then there is no better web design agency that can help to develop a custom website design for you. NgDesign is a full-service web design and development company in Belgium. We provide complete and professional website design world wide with SEO and digital marketing. We are a team of experienced website designers and web developers. We have worked with thousands of clients and established ourselves as one of the most trusted online solution providers for businesses.
      </p>


      </div>
      <div class="col-md-5 col-md-pull-7">
      <img class="featurette-image img-responsive center-block"
      src="https://picsum.photos/450/301"
      data-src="holder.js/500x500/auto"
      alt="1020">
      </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
      <div class="col-md-7">
      <h2 class="featurette-heading">Multi usuarios<span class="text-muted">Checkmate.</span></h2>
      <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
      <img class="featurette-image img-responsive center-block"
      src="https://picsum.photos/450/302"
      data-src="holder.js/500x500/auto" alt="Generic placeholder image">
      </div>
      </div>


      <hr class="featurette-divider">

      <div class="row featurette">
      <div class="col-md-7">
      <h2 class="featurette-heading">Multi usuarios<span class="text-muted">Checkmate.</span></h2>
      <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
      <img class="featurette-image img-responsive center-block"
      src="https://picsum.photos/450/303"
      data-src="holder.js/500x500/auto" alt="Generic placeholder image">
      </div>
      </div>

      <hr class="featurette-divider">


     */
    ?>


</div><!-- /.container -->




