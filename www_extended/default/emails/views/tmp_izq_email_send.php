


<a href="index.php?c=emails&a=details&id=<?php echo $mensaje['id']; ?>" class="list-group-item">
    <b><?php echo $mensaje['subjet']; ?></b><br>
    <span class="glyphicon glyphicon-user"></span> <?php echo contacts_formated($mensaje['sender_id']); ?><br>
    <span class="glyphicon glyphicon-folder-open"></span> <?php echo $mensaje['folder']; ?>
</a>
