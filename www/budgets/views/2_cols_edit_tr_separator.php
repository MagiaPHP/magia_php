<tr style="cursor: all-scroll" class="<?php echo $class; ?>" id = "<?php echo $line->getId(); ?>">

    <td colspan='<?php echo count($cbects) - 8; ?>'>
        <?php echo $line->getDescription(); ?>
    </td>

    <td><?php include "modal_items_edit_separator.php"; ?></td>
    <td><?php include "modal_items_delete_line.php"; ?></td>





</tr>   