<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

        <?php
        $i = 1;
        foreach (blog_list() as $key => $bl) {
            $my_blog = new Blog();
            $my_blog->setBlog($bl['id']);
            echo '<li data-target="#myCarousel" data-slide-to="' . $i . '"></li>';
        }
        ?>


    </ol>


    <div class="carousel-inner" role="listbox">


        <div class="item active">
            <img class="first-slide" 
                 src="https://picsum.photos/1990/300" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Namaste.</h1>
                    <p>Bienvenido a Factuz.</p>
                    <?php // <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>?>
                </div>
            </div>
        </div>

        <?php
        /**
         * 
          <div class="item">
          <img class="second-slide" src="https://picsum.photos/1990/301" alt="Second slide">
          <div class="container">
          <div class="carousel-caption">
          <h1>Another example headline.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
          </div>
          </div>
          </div>
         * 
          <div class="item">
          <img class="third-slide" src="https://picsum.photos/1990/302" alt="Third slide">
          <div class="container">
          <div class="carousel-caption">
          <h1>One more for good measure.</h1>
          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
          </div>
          </div>
          </div>

         * 
         */
        ?>



        <?php
        $i = 1;
        foreach (blog_list() as $key => $bl) {
            $my_blog = new Blog();
            $my_blog->setBlog($bl['id']);

            echo '<div class="item">
            <img class="third-slide" src="https://picsum.photos/1990/30' . $i++ . '" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>' . $my_blog->getTitle() . '</h1>
                    
                    <p><a class="btn btn-lg btn-primary" href="index.php?c=public_html&a=details&id=' . $my_blog->getId() . '" role="button">' . _tr("Read") . '</a></p>
                </div>
            </div>
        </div>';
        }
        ?>




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
