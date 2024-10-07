<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php echo _menu_icon('top', 'projects'); ?>
        <?php _t('Projects'); ?>
    </a>
    <a href="index.php?c=projects" class="list-group-item"><?php _t('List'); ?></a>
    <?php
//    foreach (projects_list() as $key => $plid) {
//        $icon = ($plid['id'] == $projects->getId()) ? icon("chevron-right") : "";
//        echo '<a href="index.php?c=projects&a=details&id=' . $plid['id'] . '" class="list-group-item">' . $icon . ' ' . $plid['name'] . '</a>';
//    }
    ?>
</div>

<?php

//foreach (budgets_search_by_client($projects->getContact_id()) as $key => $bsbci) {
//
//    echo '<div class="panel panel-default">
//    <div class="panel-heading">
//        ' . _tr('Budget') . ' : ' . $bsbci['id'] . '
//    </div>
//    <div class="panel-body">
//        <table class="table table-condensed">
//            <tr>
//                <td>Labor a realizar</td>
//                <td class="text-right">30%</td>            
//            </tr>
//            <tr>
//                <td>Labor a realizar</td>
//                <td class="text-right">30%</td>            
//            </tr>           
//        </table>
//    </div>
//</div>';
//}


?>



