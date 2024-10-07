
<tr style = "cursor: all-scroll" class = "<?php echo $class; ?>" id = "<?php echo $line->getId(); ?>">

    <td colspan='<?php echo count($cbects) - 8; ?>'>
        <?php echo $line->getDescription(); ?>
    </td>

    <td><?php include "modal_items_edit_note.php"; ?></td>

    <td class="text-right"> 
        <a class="btn btn-danger" href="index.php?c=expenses&a=ok_lines_delete&id=<?php echo $line->getId(); ?>&redi[redi]=1">
            <span class="glyphicon glyphicon-trash"></span>
        </a>
    </td>


</tr>   