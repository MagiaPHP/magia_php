<?php include "header.php"; ?>


<div class="row">
    <div class="col-sx-12 col-sm-12 col-md-2 col-lg-2">
        <?php // include view("home", "izq_frequent_questions"); ?>
    </div>

    <div class="col-sx-12 col-sm-12 col-md-8 col-lg-8">

        <?php include view("home", "nav"); ?>


        <h1>
            <a name="top"></a><?php _t("Documentation"); ?>
        </h1>
        <ol>
            <?php
            //vardump($u_language); 


            foreach (docu_list_controllers_by_lang($u_language) as $key => $clc) {

                echo '<li><a href="#' . $clc["controllers"] . '">' . $clc["id"] . ' ' . _tr($clc["controllers"]) . '</a></li>';

                echo '<ul>';
//                foreach (docu_list_actions_by_controllers($clc["controllers"]) as $key => $dlabc) {
//                    echo '<li><a href="#' . $clc["controllers"] . '_' . $dlabc["action"] . '">' . $dlabc["id"] . ' (' . $clc["language"] . ') : ' . $dlabc["title"] . '</a></li>';
//                    echo '<ul>';
//
//                    foreach (docu_blocs_search_by_docu_id($dlabc["id"]) as $key => $dbsbdi) {
//                        echo '<li><a href="#' . $clc["controllers"] . '_' . $dlabc["action"] . '_' . $dbsbdi["id"] . '">' . $dbsbdi["id"] . ' (' . $clc["language"] . ') : ' . $dbsbdi["title"] . '</a></li>';
//                    }
//                    echo '</ul>';
//                }
                echo '</ul>';
            }
            ?>  
        </ol>

        <br>
        <br>
        <br>
        <br>

        <?php
//        echo '<div class="row">';
//        $i = 0;
//        foreach (docu_list_controllers_by_lang($u_language) as $key => $clc) {
//            include "documentation_tmp_index.php";
//            $i++;
//
//            if ($i > 5) {
//                $i = 0;
//            }
//
////                echo '<li><b><a href="#' . $clc['controllers'] . '">' . $clc['controllers'] . '</a></b></li>';
////                echo "<ul>";
////                foreach (docu_list_actions_by_controllers($clc["controllers"]) as $key => $dlabc) {
////                    $post = new Docu();
////                    $post->setDocu($dlabc['id']);
////                    echo "<li><a href='#" . $post->getControllers() . "_" . $post->getAction() . "'>" . $post->getTitle() . "</a></li>";
////                }
////                echo "</ul>";
//        }
//        echo '</div>';
        ?>           




        <?php
        
        vardump($u_language); 
        
        foreach (docu_list_controllers_by_lang($u_language) as $key => $clc) {



            echo '  <hr>            
                  <h2>'.$clc['language'].' ' . $icon . ' <a name="' . $clc['controllers'] . '"></a>' . _tr($clc['controllers']) . '</h2>
                  <h3>' . ($clc['language']) . '</h3>
              
              ';

            echo "<ul>";
            foreach (docu_list_actions_by_controllers($clc["controllers"]) as $key => $dlabc) {

                $post = new Docu();
                $post->setDocu($dlabc['id']);

                echo "<li><a name='" . $post->getControllers() . "_" . $post->getAction() . "'></a><b>" . $post->getTitle() . "</b> </li>";

                //echo '<li>';
                
                echo '<ul>';
                foreach (docu_blocs_search_by_docu_id($dlabc["id"]) as $key => $dbsbdi) {
                    echo '<li><b><a name="#' . $clc["controllers"] . '_' . $dlabc["action"] . '_' . $dbsbdi["id"] . '"></a>' . $dbsbdi["title"] . '</b></li>';
                }
                echo '</ul>';
                
                //echo '</li>';
            }
            echo "</ul>";

            //
            //
            //
            //
            //

            foreach (docu_list_actions_by_controllers($clc["controllers"]) as $key => $dlabc) {

                $post = new Docu();
                $post->setDocu($dlabc['id']);

                echo "<p><a name='" . $post->getControllers() . "_" . $post->getAction() . "'></a><b>" . $post->getTitle() . "</b></p>";
                echo $post->getPost();
                echo "<br>";

                foreach (docu_blocs_search_by_docu_id($dlabc["id"]) as $key => $dbsbdi) {
                    echo '<p><b><a name="#' . $clc["controllers"] . '_' . $dlabc["action"] . '_' . $dbsbdi["id"] . '"></a>' . $dbsbdi["title"] . '</b></p>';
                    echo '<p>' . $dbsbdi["post"] . '</p>';
                    echo $top = "<a href='#top'>" . _tr('Back to index') . "</a>";

                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                }



                echo $top = "<a href='#top'>" . _tr('Back to index') . "</a>";

                echo "<br>";
                echo "<br>";
                echo "<br>";
            }
        }
        ?>  







    </div>

    <div class="col-sx-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("home", "der"); ?>
    </div>


</div>



<?php include view("home", "footer_about"); ?> 





<?php include "footer.php"; ?>
