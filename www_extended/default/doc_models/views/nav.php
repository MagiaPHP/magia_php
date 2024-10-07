<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">PDF</a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">



            <?php
//            foreach (doc_elements_search_by('status', 1) as $key => $elements_list) {
//                //include "modal_izq_add.php";
//                //include "modal_izq_add_tags.php";
//            }
            ?>




            <?php
            /**
             *             <form class="navbar-form navbar-left" method="get" action="index.php">
              <input type="hidden" name="c" value="doc_models">
              <input type="hidden" name="a" value="search">

              <div class="form-group">
              <select name="modele" class="form-control selectpicker" id="modele" data-live-search="true" >
              <?php doc_models_select("name", "name", $modele, array()); ?>
              </select>
              </div>

              <div class="form-group">
              <select class="form-control selectpicker" name="doc" data-live-search="true" >
              <option value=""><?php _t('Select one'); ?></option>
              <?php
              foreach (doc_docs_list() as $doc_list) {
              $selected = ($doc_list['doc'] == $doc) ? " selected " : "";
              echo '<option value="' . $doc_list['doc'] . '" ' . $selected . '>' . _tr($doc_list['doc']) . '</option>';
              }
              ?>
              </select>
              </div>

              <button type="submit" class="btn btn-default">
              <span class="glyphicon glyphicon-refresh"></span>
              <?php _t('Changer'); ?>

              </button>
              </form>
             */
            ?>















        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>



<?php
/**
 * 
  <button type="button" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
  </button>

  <button type="button" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-align-center" aria-hidden="true"></span>
  </button>

  <button type="button" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-align-right" aria-hidden="true"></span>
  </button>

  <button type="button" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-italic" aria-hidden="true"></span>
  </button>

  <button type="button" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-bold" aria-hidden="true"></span>
  </button>

  <button type="button" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-font" aria-hidden="true"></span>
  </button>

  <br>
  <br>
 */
?>