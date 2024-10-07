<ul class="nav nav-pills">    

    <li role="presentation" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-folder-close"></span>
            <?php echo $email->getFolder() ?>

            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">

            <?php
            foreach (emails_folders_search_by('contact_id', $u_id) as $key => $emails_folders_search_by) {
                echo '<li><a href="index.php?c=emails&a=ok_update_folder&id=' . $email->getId() . '&folder=' . $emails_folders_search_by["folder"] . '">' . $emails_folders_search_by["icon"] . ' ' . $emails_folders_search_by["folder"] . '</a></li>';
            }
            ?>
            <li role="separator" class="divider"></li>
            <li>
                <a href="#" data-toggle="modal" data-target="#myModal">
                    <?php _t("New folder"); ?>
                </a>
            </li>
        </ul>
    </li>

    <li role="presentation"><a href="#"><span class="glyphicon glyphicon-share-alt"></span> Renviar</a></li>
    <li role="presentation"><a href="#"><span class="glyphicon glyphicon-trash"></span> Borrar</a></li>
    <li role="presentation"><a href="#"><span class="glyphicon glyphicon-print"></span> Print</a></li>
</ul>