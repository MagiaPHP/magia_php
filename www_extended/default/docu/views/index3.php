<?php include view("home", "header"); ?>  

<?php include view("docu", "nav"); ?>

<div class="row">
    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include view("docu", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6">
        <?php //include view("docu", "nav"); ?>

        <a name="top"></a>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <h1>Bienvendos a la doc</h1>

        <h3></h3>



        <?php
        /**
          function link_to($id) {
          global $config_company_domain_name;
          $html = '<a
          class=""
          role="button"
          data-toggle="collapse"
          href="#docu_' . $id . '"
          aria-controls="docu_' . $id . '"
          aria-expanded="false"
          >
          <span class="glyphicon glyphicon-link"></span>
          </a>
          <div class="collapse" id="docu_' . $id . '">
          <div class="well">
          ' . $config_company_domain_name . '/index.php?c=docu#' . $id . ' <br>
          <a href="' . $config_company_domain_name . '/index.php?c=docu#' . $id . '">' . _tr("Add inside") . ' ' . $id . '</a> <br>
          </div>
          </div>';

          return $html;
          }

          function link_top() {
          return '<a href="#top">' . _tr("Top") . '</a>';
          }

          ////////////////////////////////////////////////////////////////////////
          ////////////////////////////////////////////////////////////////////////
          ////////////////////////////////////////////////////////////////////////
          ////////////////////////////////////////////////////////////////////////
          foreach (docu_search_h1() as $key => $h1) {
          //            echo "<h1>1 <a name='" . $h1['id'] . "'></a>" . $h1['title'] . "</h1>";
          //            echo link_to($h1['id']);
          //            echo '<p>' . $h1['post'] . '</p>';
          //            echo link_top();
          }




          foreach (docu_list_of_children(8) as $key => $h2) {
          echo '<h2>2 ' . $h2['h'] . '<a name="' . $h2['id'] . '"></a>' . $h2['title'] . '</h2>';
          echo link_to($h2['id']);
          echo '<p>' . $h2['post'] . '</p>';
          echo link_top();
          //                echo "<ul>";
          foreach (docu_list_of_children($h2['id']) as $key => $h3) {
          echo '<h3>3 ' . $h3['h'] . '<a name="' . $h3['id'] . '"></a>' . $h3['title'] . '</h3>';
          echo link_to($h3['id']);
          echo '<p>' . $h3['post'] . '</p>';
          echo link_top();

          //                    echo "<ul>";
          foreach (docu_list_of_children($h3['id']) as $key => $h4) {
          echo '<h4>4 <a name="' . $h4['id'] . '"></a>' . $h4['title'] . '</h4>';
          echo link_to($h4['id']);
          echo '<p>' . $h4['post'] . '</p>';
          echo link_top();

          //                        echo "<ul>";
          foreach (docu_list_of_children($h4['id']) as $key => $h5) {
          echo '<h5>5 <a name="' . $h5['id'] . '"></a>' . $h5['title'] . '</h5>';
          echo link_to($h5['id']);
          echo '<p>' . $h5['post'] . '</p>';
          echo link_top();

          foreach (docu_list_of_children($h5['id']) as $key => $h6) {
          echo '<h6><a name="' . $h6['id'] . '"></a>' . $h6['title'] . '</h6>';
          echo link_to($h6['id']);
          echo '<p>' . $h6['post'] . '</p>';
          echo link_top();
          }
          //                            echo "add 2";
          }
          //                        echo "</ul>";
          }
          //                    echo "</ul>";
          }
          //                echo "</ul>";
          }
          ?>

          <a
          class=""
          role="button"
          data-toggle="collapse"
          href="#collapseExample"
          aria-controls="collapseExample"
          aria-expanded="false"
          >
          <span class="glyphicon glyphicon-chevron-down"></span>
          </a>
          <div class="collapse" id="collapseExample">
          <div class="well">
          https://www.factux.com/index.php?c=docu&a=details&id=xxxxxx#yyyy
          </div>
          </div>









          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>

          <h1>Titulo</h1>
          <h2>Subtitulo</h2>
          <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
          </p>


          <blockquote>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
          </blockquote>



          <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur metus neque, vulputate sagittis massa eu, eleifend ultricies orci. Pellentesque eleifend orci nisl, a ultricies augue lacinia et. Nam eu velit quis erat sollicitudin dignissim quis in felis. Fusce scelerisque convallis scelerisque. Phasellus ut faucibus lacus, id dignissim libero. Quisque at maximus enim. Vestibulum sit amet imperdiet lorem. Mauris non ultrices risus. Proin condimentum lectus metus, quis pulvinar turpis lobortis non. Nunc fermentum dictum pharetra. Nunc dictum felis et volutpat tincidunt.
          </p>



          <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur metus neque, vulputate sagittis massa eu, eleifend ultricies orci. Pellentesque eleifend orci nisl, a ultricies augue lacinia et. Nam eu velit quis erat sollicitudin dignissim quis in felis. Fusce scelerisque convallis scelerisque. Phasellus ut faucibus lacus, id dignissim libero. Quisque at maximus enim. Vestibulum sit amet imperdiet lorem. Mauris non ultrices risus. Proin condimentum lectus metus, quis pulvinar turpis lobortis non. Nunc fermentum dictum pharetra. Nunc dictum felis et volutpat tincidunt.
          </p>


          <h4>Este es un h4 de referencia</h4>


          <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur metus neque, vulputate sagittis massa eu, eleifend ultricies orci. Pellentesque eleifend orci nisl, a ultricies augue lacinia et. Nam eu velit quis erat sollicitudin dignissim quis in felis. Fusce scelerisque convallis scelerisque. Phasellus ut faucibus lacus, id dignissim libero. Quisque at maximus enim. Vestibulum sit amet imperdiet lorem. Mauris non ultrices risus. Proin condimentum lectus metus, quis pulvinar turpis lobortis non. Nunc fermentum dictum pharetra. Nunc dictum felis et volutpat tincidunt.
          </p>



          <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur metus neque, vulputate sagittis massa eu, eleifend ultricies orci. Pellentesque eleifend orci nisl, a ultricies augue lacinia et. Nam eu velit quis erat sollicitudin dignissim quis in felis. Fusce scelerisque convallis scelerisque. Phasellus ut faucibus lacus, id dignissim libero. Quisque at maximus enim. Vestibulum sit amet imperdiet lorem. Mauris non ultrices risus. Proin condimentum lectus metus, quis pulvinar turpis lobortis non. Nunc fermentum dictum pharetra. Nunc dictum felis et volutpat tincidunt.
          </p>


          <h4>Este es un h4 de referencia</h4>








          <code>
          if( val = 1 ){
          actions
          }
          </code>

          <hr>

          To switch directories, type <kbd>cd</kbd> followed by the name of the directory.<br>
          To edit settings, press <kbd><kbd>ctrl</kbd> + <kbd>,</kbd></kbd>

          <h2>Otras cosas</h2>
          <p>Puedes hacer tambien un </p>

          <pre>&lt;p&gt;Sample text here...&lt;/p&gt;</pre>

          <h3>Tabla de informacion</h3>

          <table class="table">
          <tr>
          <td>col 1</td>
          <td>col 2</td>
          <td>col 3</td>
          <td>col 4</td>
          </tr>

          <tr>
          <td>col 1</td>
          <td>col 2</td>
          <td>col 3</td>
          <td>col 4</td>
          </tr>

          <tr>
          <td>col 1</td>
          <td>col 2</td>
          <td>col 3</td>
          <td>col 4</td>
          </tr>

          <tr>
          <td>col 1</td>
          <td>col 2</td>
          <td>col 3</td>
          <td>col 4</td>
          </tr>

          <tr>
          <td>col 1</td>
          <td>col 2</td>
          <td>col 3</td>
          <td>col 4</td>
          </tr>

          <tr>
          <td>col 1</td>
          <td>col 2</td>
          <td>col 3</td>
          <td>col 4</td>
          </tr>

          </table>


          <p>Si deseas puedes poner una direccion</p>

          <address>
          <strong>Twitter, Inc.</strong><br>
          1355 Market Street, Suite 900<br>
          San Francisco, CA 94103<br>
          <abbr title="Phone">P:</abbr> (123) 456-7890
          </address>

          <address>
          <strong>Full Name</strong><br>
          <a href="mailto:#">first.last@example.com</a>
          </address>




          <h3><span class="glyphicon glyphicon-ok"></span> Puedes poner una imagen </h3>

          <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur metus neque, vulputate sagittis massa eu, eleifend ultricies orci. Pellentesque eleifend orci nisl, a ultricies augue lacinia et. Nam eu velit quis erat sollicitudin dignissim quis in felis. Fusce scelerisque convallis scelerisque. Phasellus ut faucibus lacus, id dignissim libero. Quisque at maximus enim. Vestibulum sit amet imperdiet lorem. Mauris non ultrices risus. Proin condimentum lectus metus, quis pulvinar turpis lobortis non. Nunc fermentum dictum pharetra. Nunc dictum felis et volutpat tincidunt.
          </p>



          <img src="https://cdn.document360.io/45c80a54-ac62-463f-b4bc-dd536a92dab4/Images/Documentation/image-1689152969629.png?sv=2019-07-07&sig=0JEycN7sD%2FuRK%2FU4RMIf4YQ4rSr3Nd%2B7e5%2B68W55JmQ%3D&spr=https%2Chttp&st=2023-09-28T17%3A34%3A15Z&se=2023-09-28T17%3A44%3A15Z&srt=o&ss=b&sp=r" alt="alt"/>



          <h3><span class="glyphicon glyphicon-ok"></span> Puedes poner un video </h3>

          <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur metus neque, vulputate sagittis massa eu, eleifend ultricies orci. Pellentesque eleifend orci nisl, a ultricies augue lacinia et. Nam eu velit quis erat sollicitudin dignissim quis in felis. Fusce scelerisque convallis scelerisque. Phasellus ut faucibus lacus, id dignissim libero. Quisque at maximus enim. Vestibulum sit amet imperdiet lorem. Mauris non ultrices risus. Proin condimentum lectus metus, quis pulvinar turpis lobortis non. Nunc fermentum dictum pharetra. Nunc dictum felis et volutpat tincidunt.
          </p>

          <iframe width="560" height="315" src="https://www.youtube.com/embed/RZ5CwjtVZeA?si=MfnufdMEU8ZI_88Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
         */
        ?>





    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("docu", "der"); ?>
    </div>


</div>

<?php include view("home", "footer"); ?> 

