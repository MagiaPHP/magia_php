<div class="list-group">
    <a href="index.php?c=emails&a=new_mail" class="list-group-item">
        <span class="glyphicon glyphicon-pencil"></span>
        <?php _t("New mail"); ?>
    </a>
</div>


<ul class="list-group">
    <li class="list-group-item"><span class="glyphicon glyphicon-inbox"></span> 
        <span class="badge">14</span> 
        <a href="index.php?c=emails">Inbox</a>
    </li>
    <li class="list-group-item"><span class="glyphicon glyphicon-check"></span> <span class="badge">14</span> <a href="index.php?c=emails"> Read</a></li>
    <li class="list-group-item"><span class="glyphicon glyphicon-send"></span> <a href="index.php?c=emails&a=sent"><?php _t("Sent"); ?></a></li>
    <?php
    /**
     *     <li class="list-group-item"><span class="glyphicon glyphicon-lamp"></span> <span class="badge">5</span> Draft</li>

     *     <li class="list-group-item"><span class="glyphicon glyphicon-time"></span> <span class="badge">5</span> Programados</li>

     */
    ?>
    <?php
    // a los folders del contacto se les agrega los folders en null
    $folders_globals = emails_folders_globals();
    // folders del usuario
    $folders_contact = emails_folders_search_by('contact_id', $u_id);
    // los dos juntos
    $folders_all = array_merge($folders_globals, $folders_contact);

    foreach ($folders_all as $key => $emails_folders_search_by) {
        echo '<li class="list-group-item">';
        echo $emails_folders_search_by["icon"];
        echo '<a href="index.php?c=emails&a=search&w=by_folder_reciver&folder=' . $emails_folders_search_by["folder"] . '&reciver_id=' . $u_id . '&1"> ';
        echo ($emails_folders_search_by["contact_id"]) ? ($emails_folders_search_by["folder"]) : _tr($emails_folders_search_by["folder"]);
        echo '</a>';
        echo '</li>';
    }
    ?>



    <li class="list-group-item"><span class="glyphicon glyphicon-plus-sign"></span> 
        <a href="#" data-toggle="modal" data-target="#add_folder">
            <?php _t("Add folder") ?>
        </a>
    </li>



    <li class="list-group-item"><span class="glyphicon glyphicon-cog"></span> 
        <a href="index.php?c=emails&a=config">
            Config
        </a>
    </li>
</ul>




<div class="modal fade" id="add_folder" tabindex="-1" role="dialog" aria-labelledby="add_folder">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="add_folder"> <?php _t("Add folder"); ?></h4>
            </div>

            <div class="modal-body">
                <?php
                $redi = 4;
                include view("emails_folders", "form_add");
                $redi = "";
                ?>
            </div>


        </div>
    </div>
</div>

<?php
echo $u_id;
?>