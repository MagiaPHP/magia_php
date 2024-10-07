
<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Doc model"); ?>
    </div>
    <div class="panel-body">
        <p>
            <?php echo $doc_models->getDescription(); ?>
        </p>
    </div>




    <ul class="list-group">
        <?php
        foreach (doc_models_lines_list_distinct_doc_by_modele($doc_models->getName()) as $key => $mlldbm) {
            echo '<li class="list-group-item"><a href="index.php?c=doc_models_lines&a=details_by_modele_doc&doc=' . $mlldbm['doc'] . '&update=1">' . $mlldbm['doc'] . '</a></li>';
        }
        ?>
    </ul>
</div>

