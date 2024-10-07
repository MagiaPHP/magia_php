<?php
//vardump(docu_list_controllers_by_lang($u_language));
?>
<div class="text-center">
    <a 
        class="btn btn-warning" 
        href="index.php?c=docu&a=export_pdf"
        target="docu"
        >
        <span class="glyphicon glyphicon-print"></span> 
        <?php _t("PDF") ?>

    </a>
</div>

<br>




<h3>
    <a href="index.php?c=docu&a=edit&id=<?php echo $docu->getId(); ?>">
        <?php echo icon("chevron-left"); ?>
    </a>

</h3>    



<ul class="list-group">
    <?php
    foreach (docu_blocs_search_by('docu_id', $docu_blocs->getDocu_id()) as $key => $dbcb) {

        $class_dbsb = ($dbcb['id'] == $id) ? " list-group-item-warning " : "";

        echo '<li class="list-group-item ' . $class_dbsb . '"><a href="index.php?c=docu_blocs&a=edit&id=' . $dbcb["id"] . '">   ' . $dbcb["bloc"] . '</a></li>';
    }
    ?>

</ul>