<?php
# MagiaPHP 
# file date creation: 2023-02-08 
?>
<?php include view("home", "header"); ?> 

<?php include "nav.php"; ?>


<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("tasks", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include "izq_details.php"; ?>
    </div>

    <div class="col-sm-12 col-md-5 col-lg-5">



        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>




        <h1><?php echo $tasks->getTitle(); ?></h1>

        <p>
            <b><?php _t("Controller"); ?>:</b> <?php echo $tasks->getController(); ?>, 
            <b><?php _t("Doc id"); ?>: </b> <?php echo ($tasks->getDoc_id()) ? '<a href="index.php?c=' . $tasks->getController() . '&a=details&id=' . $tasks->getDoc_id() . '">' . $tasks->getDoc_id() . '</a>' : ''; ?>
        </p>

        <p>
            <?php echo _tr(tasks_categories_field_id('category', $tasks->getCategory_id())); ?>
            <span class="glyphicon glyphicon-calendar"></span>

            <?php echo ($tasks->getDate_registre()); ?>  

            <span class="glyphicon glyphicon-user"></span>
            <?php echo contacts_formated($tasks->getContact_id()); ?>
        </p>


        <?php include "form_edit.php"; ?>



        <?php
        foreach (tasks_medias_search_by('task_id', $tasks->getId()) as $key => $tmsbid) {

            switch ($tmsbid['type']) {
                case 'youtube':
                    echo '<div class="panel panel-default">
            <div class="panel-body">

                <iframe 
                    width="100%" 
                    height="615" 
                    src="https://www.youtube.com/embed/' . $tmsbid['url'] . '" 
                    title="YouTube video player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    referrerpolicy="strict-origin-when-cross-origin" 
                    allowfullscreen>
                </iframe>
            </div>
            <div class="panel-footer">
            <p>' . $tmsbid['description'] . '</p>
                <a href="index.php?c=tasks_medias&a=ok_delete&id=' . $tmsbid['id'] . '&redi[redi]=5&redi[c]=tasks&redi[a]=edit&redi[params]=' . urlencode('id=' . $tasks->getId()) . '" class="btn btn-danger">' . _tr("Delete") . '</a>
            </div>
        </div>';

                    break;
                case 'image':

                    echo '  <div class="panel panel-default">
            <div class="panel-body">
                <img src="' . $tmsbid['url'] . '" alt="" class="img-thumbnail">

            </div>
            <div class="panel-footer">
                <p>' . $tmsbid['description'] . '</p>

                <a href="index.php?c=tasks_medias&a=ok_delete&id=' . $tmsbid['id'] . '&redi[redi]=5&redi[c]=tasks&redi[a]=edit&redi[params]=' . urlencode('id=' . $tasks->getId()) . '" class="btn btn-danger">' . _tr("Delete") . '</a>
            </div>
        </div>';
                    break;

                default:
                    break;
            }
        }
        ?>

        <?php
################################################################################
# C O M M E N T S
################################################################################
################################################################################
// Si el modulo activo
        if (modules_field_module('status', 'comments')) {


            if (permissions_has_permission($u_rol, "comments", "read")) {
                echo '<div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="shadow-container">';
                echo '<a name="comments"></a>';
                echo "<h4>" . _tr("Comments") . "</h4>";

                $args['redi'] = '5';
                $args['c'] = $c;
                $args['a'] = $a;
                $args['params'] = (isset($id)) ? "id=$id" : "";

                include view("comments", "comments");
                echo '</div>
            </div>
        </div>
        
<br>
        ';
            }

            echo '<a name="add_comments"></a>';
            if (permissions_has_permission($u_rol, "comments", "create")) {


//                $args['redi'] = '5';
//                $args['c'] = $c;
//                $args['a'] = $a;
//                $args['params'] = (isset($id)) ? "id=$id" : "";

                include view("comments", "formCommentsUpdate");

                echo '<br>';
                echo '<br>';
                echo '<br>';
            }
        }

################################################################################
# C O M M E N T S
################################################################################
################################################################################
        ?>














    </div>






    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "der_edit.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
