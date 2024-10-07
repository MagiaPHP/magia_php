<table class="table">
    <?php
    foreach (emails_tmp_search_by_order_by('contact_id', $u_id, ' `controller`, `tmp` ') as $key => $emails_tmp_search_by) {
        echo '<tr>';
        echo '<td> <span class="glyphicon glyphicon-folder-close"></span> ' . _tr($emails_tmp_search_by["controller"]) . '</td>';
        echo '<td> <span class="glyphicon glyphicon-file"></span> ';
        echo '<a href="index.php?c=emails&a=config_tmp_emails_edit&id=' . $emails_tmp_search_by["id"] . '">' . $emails_tmp_search_by["tmp"] . '</a></td>';
        echo '<td class="text-right"><a href="index.php?c=emails_tmp&a=ok_delete&id=' . $emails_tmp_search_by['id'] . '&redi=3"><span class="glyphicon glyphicon-trash"></span></a></td>';
        echo '</tr>';
    }
    ?>


</table>