<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("doc_models", "izq_index"); ?>
        <?php include view("config", "izq_doc_models"); ?>
    </div>

    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
        <?php // include view("doc_models", "nav"); ?>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <h3>
                    <?php _t("Doc Models"); ?>
                    <a class="btn btn-default" 
                       role="button" 
                       data-toggle="collapse" 
                       href="#donwload" 
                       aria-expanded="false" 
                       aria-controls="donwload">
                           <?php _t("Donwload"); ?>
                    </a>
                </h3>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right">
                <h3>
                    <a href="index.php?c=doc_models&a=add" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("Add new"); ?>
                    </a>
                </h3>
            </div>
        </div>
        <hr>


        <div class="collapse" id="donwload">
            <div class="well">
                <form>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                        <p class="help-block">
                            Si vous avez une extension au format .zip, vous pouvez l’installer ou la mettre à jour en la téléversant ici.
                        </p>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>


        <div class="row">

            <?php
            vardump(_options_option("doc_model"));

            foreach ($doc_models as $key => $doc_model) {

                $btn_use = (_options_option("doc_model") !== $doc_model['name'] ) ? '<a href="index.php?c=doc_models&a=ok_change_model&modele=' . $doc_model['name'] . '" class="btn btn-xs  btn-danger" role="button">' . _tr("Use this") . '</a>' : "";

                $mol1 = '<div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="panel panel-default">
  <div class="panel-body">
  

<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="https://picsum.photos/100/100" alt="...">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">' . $doc_model['name'] . '</h4>
    <p>' . $doc_model['description'] . '</p>
  </div>
</div>
</div>
 
<div class="panel-footer">
<a href="index.php?c=doc_models&a=details&id=' . $doc_model['id'] . '" class="btn btn-primary" role="button">' . _tr("Details") . '</a> 
<a href="index.php?c=doc_models&a=search&modele=' . $doc_model['name'] . '" class="btn btn-primary" role="button">' . _tr("Edit") . '</a> 
' . $btn_use . '
</div>
</div>
</div>
';

                $mol2 = '<div class="col-sm-6 col-md-2 col-lg-2">
                <div class="thumbnail">
                    <img src="./www_extended/default/doc_models/views/a/img/a.png" alt="">
                    <div class="caption">
                        <h3>' . $doc_model['name'] . '</h3>
                        <p>' . $doc_model['description'] . '</p>
                        <p>
                            <a href="index.php?c=doc_models&a=details&id=' . $doc_model['id'] . '" class="btn btn-xs btn-primary" role="button">' . _tr("Details") . '</a> 
                            <a href="index.php?c=doc_models&a=search&modele=' . $doc_model['name'] . '" class="btn btn-xs btn-primary" role="button">' . _tr("Edit") . '</a> 
                            ' . $btn_use . '
                        </p>
                    </div>
                </div>
            </div>';

                echo $mol2;

                $btn_use = false;
            }
            ?>
        </div>



        <?php
//  include view("doc_models", "table_index");
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

