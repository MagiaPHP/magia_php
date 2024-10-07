<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="blog">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $blog->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="3">


    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
            <select name="controller" class="form-control selectpicker" id="controller" data-live-search="true" >
                <?php controllers_select("controller", "controller", $blog->getController(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /controller ?>



    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="title" class="form-control" id="title" placeholder="title" value="<?php echo $blog->getTitle(); ?>" >
        </div>	
    </div>
    <?php # /title ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">



            <textarea 
                id="description"
                class="form-control" 
                name="description"
                rows="30"
                ><?php echo $blog->getDescription(); ?></textarea>

            <script src="includes/wysiwyg-1-0-0/editeur.js" type="text/javascript"></script>

            <script>
                // window.onload = function () {
                //      WYSIWYG(document.getElementById('wysiwyg-source<?php // echo $lang['language'];     ?>'));
                // };

                WYSIWYG(document.getElementById('description'), {
                    'order': ['italic', 'bold', 'unorderedlist', 'link', 'format', 'source']
                });


            </script>

            <?php
            /**
             *             <textarea
              name="description"
              class="form-control"
              id="description"
              placeholder="texta area"
              rows="10"
              ><?php echo $blog->getDescription(); ?></textarea>


              <!-- Import jQuery -->
              <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

              <!-- Import Trumbowyg -->

              <script src="includes/Trumbowyg-main/dist/trumbowyg.min.js" type="text/javascript"></script>
              <link href="includes/Trumbowyg-main/dist/ui/trumbowyg.min.css" rel="stylesheet" type="text/css"/>

              <!-- Init Trumbowyg -->
              <script>
              // Doing this in a loaded JS file is better, I put this here for simplicity
              $('#description').trumbowyg();
              </script>
             */
            ?>



            <br>
            <br>




            <?php # /description ?>

            <div class="form-group">
                <div class="col-sm-8">    
                    <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
                </div>      							
            </div>      							

            </form>


            <?php
// https://quilljs.com/docs/formats
// https://summernote.org/getting-started/
// https://github.com/JefMari/awesome-wysiwyg-editors?tab=readme-ov-file
// https://github.com/jaredreich/pell
// 
// 
// 
// 
//require 'vendor/autoload.php'; // Asegúrate de haber cargado la biblioteca Parsedown
//
//// Texto Markdown
//$markdownText = "
//# Título de Ejemplo
//
//## Título de Ejemplo
//### Título de Ejemplo
//
//Este es un **texto de ejemplo** en *Markdown*.
//
//- Lista de elementos
//- Otro elemento
//- Y otro más
//
//[Enlace de ejemplo](https://ejemplo.com)
//";
//
//// Instancia de Parsedown
//$parser = new Parsedown();
//
//// Convertir Markdown a HTML
//$html = $parser->text($markdownText);
//
//// Imprimir HTML resultante
//echo $html;
            /**
             * 
              <!-- Include Editor style. -->
              <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />

              <!-- Create a tag that we will use as the editable area. -->
              <!-- You can use a div tag as well. -->
              <textarea></textarea>

              <!-- Include Editor JS files. -->
              <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>

              <!-- Initialize the editor. -->
              <script>
              new FroalaEditor('textarea');
              </script>


             */
            ?>

