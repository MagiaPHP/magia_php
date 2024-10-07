<h2><?php _t("In the same category"); ?></h2>



<div class="row">



    <?php
//
//                        

    $i = 0;
    foreach (agenda_search_by_category_id($agenda['category_id']) as $key => $event) {
        include "agenda_item.php";
    }
    ?>


</div><!--/row-->