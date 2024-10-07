
<div class="list-group">
    <?php
    foreach (doc_sections_list_full() as $section) {
        if ($section['section'] != "") {
            echo '<a href="index.php?c=doc_sections&a=edit&id=' . $section['id'] . '" class="list-group-item">' . $section['section'] . '</a>';
        }
    }
    ?>
</div>


<div class="list-group">
    <a href="index.php?c=doc_sections&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>




