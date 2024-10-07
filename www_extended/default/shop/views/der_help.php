<?php

//vardump($u_id);
//
//vardump($_SESSION);
//
//($u_lang = users_field_contact_id("language", $u_id));

$help = array(
    "es_ES" => array(
        'title' => "Escoja un paciente",
        'description' => "Ud tiene dos posibilidades, crear un paciente nuevo, o escoger un paciente que ya esta registrado en el sistema, un paciente se identifica por su nombre, apellidos y fecha de nacimiento",
        'video' => "https://www.youtube.com/watch?v=D9st_hXNddQ",
        'url_on_line' => "http://manual.gestionmanager.com/edit-budget/",
    ),
    "fr_BE" => array(
        'title' => "Choisissez un patient",
        'description' => "Vous avez deux possibilités, créer un nouveau patient, ou choisir un patient déjà enregistré dans le système, un patient est identifié par son nom, prénoms et date de naissance",
        'video' => "https://www.youtube.com/watch?v=D9st_hXNddQ",
        'url_on_line' => "http://manual.gestionmanager.com/edit-budget/",
    ),
    "fr_NL" => array(
        'title' => "Choisissez un patient",
        'description' => "U heeft twee mogelijkheden, maak een nieuwe patiënt aan, of kies een patiënt die al in het systeem is geregistreerd, een patiënt wordt geïdentificeerd aan de hand van zijn naam, achternamen en geboortedatum",
        'video' => "https://www.youtube.com/watch?v=D9st_hXNddQ",
        'url_on_line' => "http://manual.gestionmanager.com/edit-budget/",
    ),
    "en_GB" => array(
        'title' => "Choose a patient",
        'description' => "You have two possibilities, create a new patient, or choose a patient that is already registered in the system, a patient is identified by his name, surnames and date of birth",
        'video' => "https://www.youtube.com/watch?v=D9st_hXNddQ",
        'url_on_line' => "http://manual.gestionmanager.com/edit-budget/",
    ),
);

//vardump($help['es_ES']);
?>


<?php

/*


  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

  <div class="panel panel-default">
  <div class="panel-heading" role="tab" id="headingThree">
  <h4 class="panel-title">
  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
  <span class="glyphicon glyphicon-lamp"></span>
  <?php _t("Help"); ?>
  </a>
  </h4>
  </div>
  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
  <div class="panel-body">




  <h3><?php echo ($help[$u_lang]['title']); ?></h3>


  <p>
  <?php echo ($help[$u_lang]['description']); ?>
  </p>


  <p>


  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">
  <span class="glyphicon glyphicon-film"></span> <?php _t("Video"); ?>
  </button>

  |

  <a href="http://manual.gestionmanager.com/edit-budget/" target="_new">On line</a>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel"><?php _t("Help"); ?></h4>
  </div>
  <div class="modal-body">


  <iframe width="560" height="315" src="https://www.youtube.com/embed/D9st_hXNddQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


  </div>


  </div>
  </div>
  </div>
  </p>

  <hr>


  <p>
  <?php _t("Allways open"); ?>
  </p>


  </div>
  </div>
  </div>
  </div>




  <div class="panel panel-default">
  <div class="panel-heading">
  <h3 class="panel-title">Panel title</h3>
  </div>
  <div class="panel-body">



  <form>
  <div class="form-group">
  <label for="title"><?php _t('Title'); ?></label>
  <input type="text" class="form-control" name="title" id="title" placeholder="Add a title">
  </div>


  <div class="form-group">
  <label for="description"><?php _t("Description"); ?></label>
  <textarea class="form-control" name="description" id="description" placeholder="Add the content"></textarea>
  </div>


  <div class="form-group">
  <label for="video"><?php _t('Video'); ?></label>
  <input type="text" class="form-control" name="url" id="video" placeholder="Youtube URL">
  </div>



  <div class="form-group">
  <label for="url"><?php _t('External url'); ?></label>
  <input type="text" class="form-control" name="url" id="url" placeholder="http://manual.gestionmanager.com/">
  </div>




  <div class="form-group">
  <label for="exampleInputFile">File input</label>
  <input type="file" id="exampleInputFile">
  <p class="help-block">Example block-level help text here.</p>
  </div>


  <div class="checkbox">
  <label>
  <input type="checkbox"> Check me out
  </label>
  </div>


  <button type="submit" class="btn btn-default">Submit</button>



  </form>





  </div>
  </div>







 */?>