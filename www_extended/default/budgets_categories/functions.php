<?php

//function budgets_categories_add_filter($col_name, $value) {
//
//    switch ($col_name) {
//        case "father_id":
//            return budgets_categories_field_id("category", $value);
//            break;
//
//        default:
//            return $value;
//            break;
//    }
//}

function budgets_categories_without_father($start = 0, $limit = 999999) {
    global $db;
    $data = null;
    $sql = "SELECT *
            FROM `budgets_categories` 
            WHERE `father_code` IS NULL AND `status` = 1
 
    ORDER BY `order_by`, code,  category
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function budgets_categories_childrens_of($father_code, $start = 0, $limit = 999999) {
    global $db;

    if (!$father_code) {
        return false;
    }
    $data = null;
    $sql = "SELECT *
            FROM `budgets_categories` 
            WHERE `father_code` = :father_code  AND `status` = 1
 
    ORDER BY `order_by`, code,  category
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':father_code', $father_code, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function budgets_categories_list2($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `code`,  `father_code`,  `category`,  `description`,  `order_by`,  `status`   
    FROM `budgets_categories` ORDER BY `father_code`, category Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function budgets_categories_child_li($category_code = null, $add = false) {

    if (!$category_code) {
        return;
    }
    echo '<ul>';

    foreach (budgets_categories_childrens_of($category_code) as $key => $ecsbfc) {

        $has_child = (budgets_categories_childrens_of($ecsbfc['code'])) ? 1 : 0;

        $modal = '';
        $modal .= '
<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#' . $ecsbfc['code'] . '"> + </button>
<div class="modal fade" id="' . $ecsbfc['code'] . '" tabindex="-1" role="dialog" aria-labelledby="' . $ecsbfc['code'] . 'Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="' . $ecsbfc['code'] . 'Label">
                    ' . _tr("Add category") . '
                </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="index.php">
                    <input type="hidden" name="c" value="budgets_categories">
                    <input type="hidden" name="a" value="ok_add">
                    <input type="hidden" name="father_code" value="' . $ecsbfc['code'] . '">                    
                    <input type="hidden" name="redi[redi]" value="5">
                    

                    <div class="form-group">
                        <label for="father" class="col-sm-2 control-label">' . _tr("Father") . '</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                            <div class="input-group-addon">' . $ecsbfc['code'] . '</div>
                                <input type="text" class="form-control" id="" name="" placeholder="" disabled value="' . budgets_categories_field_code('category', $ecsbfc['code']) . '">                                
                            </div>
                        </div>
                    </div>     
                    


                    <div class="form-group">
                        <label for="code" class="col-sm-2 control-label">' . _tr("Code") . '</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-addon">' . $ecsbfc['code'] . '</div>
                                <input type="number" class="form-control" id="code" name="code" placeholder="">                                
                            </div>
                        </div>
                    </div>     
                    
                    

                    <div class="form-group">
                        <label for="category" class="col-sm-2 control-label">' . _tr("Category") . '</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="category"  name="category" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">
                                ' . icon("plus") . ' 
                                ' . _tr("Add") . '
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
';

        echo '<li>' . $modal . ' <span class="text-muted"> ' . $ecsbfc['code'] . '</span> <a href="index.php?c=budgets_categories&id=' . $ecsbfc['id'] . '">' . $ecsbfc['category'] . '</a> </li>';

//        
//        if ($has_child) {
//            echo '<li class="text-muted">' . $modal . ' ' . $ecsbfc['code'] . ' ' . $ecsbfc['category'] . '</li>';
//        } else {
//            echo '<li class="text-info">' . $modal . ' ' . $ecsbfc['code'] . ' ' . $ecsbfc['category'] . ' </li>';
//        }
        echo '';
        budgets_categories_child_li($ecsbfc['code']);
    }
//    if ($add) {
//        echo '<li>' . $modal . '</li>';
//    }
    echo '</ul>';
}
