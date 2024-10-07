<div class="page-header">
    <h1><small><?php echo $expenses_categories->getCode(); ?></small> <?php echo $expenses_categories->getCategory(); ?> </h1>
</div>

<?php include "form_edit_short.php"; ?>

<hr>

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#expenses_categoriesModalDelete">
    <?php _t("Delete"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="expenses_categoriesModalDelete" tabindex="-1" role="dialog" aria-labelledby="expenses_categoriesModalDeleteLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="expenses_categoriesModalDeleteLabel">
                    <?php _t("Atention"); ?>
                </h4>
            </div>
            <div class="modal-body">



                <?php
                $error_delete = array();

                if (expenses_categories_childrens_of($expenses_categories->getCode())) {
                    array_push($error_delete, 'You cannot delete a category that has subcategories');
                }


                if (expenses_lines_search_by('category_code', $expenses_categories->getCode())) {
                    array_push($error_delete, 'You cannot delete because this category is used in one more expense record');
                }

                if ($error_delete) {

                    foreach ($error_delete as $key => $error_list) {
                        message('info', $error_list);
                    }
                } else {
                    ?>
                    <p>
                        <?php _t("You can delete only if this category is not used"); ?>
                    </p>
                    <a href="index.php?c=expenses_categories&a=ok_delete&id=<?php echo $expenses_categories->getId(); ?>&redi[redi]=1" class="btn btn-danger btn-md"><?php _t("Delete"); ?></a>
                <?php }
                ?>







            </div>


        </div>
    </div>
</div>

