<?php
# MagiaPHP 
# file date creation: 2023-09-30 
?>

<?php include view("home", "header"); ?>                


<?php // include view("docu", "nav"); ?>



<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">       
        <?php include view("docu", "izq_edit"); ?>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6">        


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>          

        <?php
        /**
         * 
          <ul class="nav nav-pills">
          <?php
          foreach (_languages_list_by_status(1) as $key => $llbe) {
          $active = ($llbe['language'] == $u_language) ? ' class="active" ' : '';
          echo '<li role="presentation" ' . $active . '><a href="#">' . _tr($llbe["name"]) . '</a></li>';
          }
          ?>
          </ul>
         */
        ?>



        <h1>
            <a href="index.php?c=docu&a=edit&id=<?php echo $docu->getId(); ?>"><?php echo $docu->getControllers() ?></a>           
            : 
            <a href="index.php?c=docu&a=edit&id=<?php echo $docu->getId(); ?>"><?php echo $docu->getAction() ?></a>


        </h1>




        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#html" aria-controls="html" role="tab" data-toggle="tab">HTML</a></li>
                <li role="presentation"><a href="#code" aria-controls="code" role="tab" data-toggle="tab">Code</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="html">
                    <p>&nbsp;</p>
                    <?php include view("docu", "form_edit_html"); ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="code">
                    <p>&nbsp;</p>
                    <?php include view("docu", "form_edit_code"); ?>

                </div>
            </div>

        </div>



        <?php
        /**
         *         <form class="form-inline" method="post" action="index.php">

          <input type="hidden" name="c" value="docu_blocs">
          <input type="hidden" name="a" value="ok_add">
          <input type="hidden" name="docu_id" value="<?php echo $docu->getId(); ?>">
          <input type="hidden" name="redi" value="3">

          <div class="form-group">
          <label class="sr-only" for="bloc"><?php ?></label>
          <input type="text" class="form-control" name="bloc" id="bloc" placeholder="<?php _t("Bloc name"); ?>" required="">
          </div>

          <button type="submit" class="btn btn-default">
          <span class="glyphicon glyphicon-plus"></span>
          <?php _t("Add"); ?>
          </button>
          </form>
          foreach (docu_blocs_search_by('docu_id', $id) as $key => $dbcb) {
         */
        ?>




        <h3><?php _t("Blocs"); ?></h3>
        <h4>
            <?php _t("Blocs list below this controller and action"); ?>
        </h4>

        <ul class="list-group">
            <?php
            foreach (docu_blocs_search_by('docu_id', $id) as $key => $dbcb) {

                $class_dbsb = ($dbcb['id'] == $id) ? " list-group-item-warning " : "";

                echo '<li class="list-group-item ' . $class_dbsb . '"><a href="index.php?c=docu_blocs&a=edit&id=' . $dbcb["id"] . '">' . $dbcb["bloc"] . '</a></li>';
            }
            ?>

        </ul>




    </div>

    <div class="col-sm-12 col-md-4 col-lg-4">

        <?php include "der_edit.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
