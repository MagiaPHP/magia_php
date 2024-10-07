<tr style="cursor: all-scroll" class="<?php echo $class; ?>" id="<?php echo "$line[id]"; ?>">  

    <td colspan='<?php echo count($cbects) - 7; ?>'>
        <?php echo $line['separator']; ?>
    </td>

    <td><?php include "modal_items_edit_line_separator.php"; ?></td>

    <td class="text-right"> 
        <a class="btn btn-danger" href="index.php?c=budgets&a=linesDeleteOk&id=<?php echo "$line[id]"; ?>&redi=1">
            <span class="glyphicon glyphicon-trash"></span>
        </a>
    </td>
<tr>