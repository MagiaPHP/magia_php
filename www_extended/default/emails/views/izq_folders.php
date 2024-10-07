<table class="table">
    <?php
    foreach (emails_folders_search_by('contact_id', $u_id) as $key => $emails_folders_search_by) {
        echo '<tr>';
        echo '<td>' . $emails_folders_search_by["icon"] . ' ';
        echo '<a href="index.php?c=emails&a=search&w=by_folder_reciver&folder=' . $emails_folders_search_by["folder"] . '&reciver_id=' . $u_id . '&1">' . $emails_folders_search_by["folder"] . '</a></td>';
        echo '<td class="text-right"><a href="index.php?c=emails_folders&a=ok_delete&id=' . $emails_folders_search_by['id'] . '&redi=3"><span class="glyphicon glyphicon-trash"></span></a></td>';
        echo '</tr>';
    }
    ?>
</table>
