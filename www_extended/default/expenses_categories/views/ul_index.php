<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, 'ul_index');
}
?>


<ul>
    <?php
    foreach (expenses_categories_without_father() as $key => $category) {

        $ecat = new Expenses_categories_e();
        
        $ecat->setExpenses_categories($category['id']);

        include "modal_subcategory_ul_index.php";

//        echo '<li> ' . $modal . ' - ' . $ecat->getCode() . ' - ' . $ecat->getCategory() . '</li>';

        echo '<li>' . $modal . ' <span class="text-muted"> ' . $ecat->getCodeFormatted() . '</span> ';
        echo $ecat->getCategory() . ' ';
        echo '<a href="index.php?c=expenses_categories&id=' . $ecat->getId() . '"> ' . _tr("Edit") . '</a>';
        echo '</li>';

        echo '' . expenses_categories_child_li($ecat->getCode(), false) . '';
    }
    echo '<li>';

    include "modal_category_ul_index.php";

    echo ' ' . _t("Add new") . '</li>';
    ?>
</ul>









