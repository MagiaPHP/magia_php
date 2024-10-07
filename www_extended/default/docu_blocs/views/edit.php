<?php
# MagiaPHP 
# file date creation: 2024-03-07 
?>

<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">      
        <?php include view("docu_blocs", "izq_edit"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <h1>
            <a href="index.php?c=docu&a=edit&id=<?php echo $docu->getId(); ?>"><?php echo $docu->getControllers() ?></a>           
            : 
            <a href="index.php?c=docu&a=edit&id=<?php echo $docu->getId(); ?>"><?php echo $docu->getAction() ?></a>
            : 
            <?php echo $docu_blocs->getBloc(); ?>
        </h1>



        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>  



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
                    <?php include view("docu_blocs", "form_edit_html"); ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="code">
                    <p>&nbsp;</p>
                    <?php include view("docu_blocs", "form_edit_code"); ?>

                </div>
            </div>

        </div>


        <h3><?php _t("Blocs"); ?></h3>
        <h4>
            <?php _t("Blocs list below this controller and action"); ?>
        </h4>

        <ul class="list-group">
            <?php
            foreach (docu_blocs_search_by('docu_id', $docu_blocs->getDocu_id()) as $key => $dbcb) {

                $class_dbsb = ($dbcb['id'] == $id) ? " list-group-item-warning " : "";

                echo '<li class="list-group-item ' . $class_dbsb . '"><a href="index.php?c=docu_blocs&a=edit&id=' . $dbcb["id"] . '">   ' . $dbcb["bloc"] . '</a></li>';
            }
            ?>

        </ul>



        <br>
        Code
        <code>
            <pre><?php // https://ascii.cl/htmlcodes.htm      ?>
&#60;&#63;php
if (modules_field_module('status', "docu")) {
    // nombre del archivo sin el punto ni la extencion 
    // form_search_by_office.php > form_search_by_office
    // en los form, al final
    //
    echo docu_modal_bloc($c, $a, '<?php echo $docu_blocs->getBloc(); ?>');
}
?>
            </pre>
        </code>


        <?php //include view("docu_blocs", "form_edit", $arg = ["redi" => 1]);    ?>


    </div>

    <div class="col-sm-12 col-md-4 col-lg-4">        
        <?php include view("docu", "der_edit"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
