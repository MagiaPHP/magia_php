<ul class="list-group">

    <?php
    foreach (emails_folders_search_by('contact_id', $u_id) as $key => $emails_folders_search_by) {
        echo '<li class="list-group-item"><a href="index.php?c=emails&a=search&w=by_folder_reciver&folder=' . $emails_folders_search_by["folder"] . '&reciver_id=' . $u_id . '&1">' . $emails_folders_search_by["icon"] . ' ' . $emails_folders_search_by["folder"] . '</a> </li>';
    }
    ?>
</ul>
