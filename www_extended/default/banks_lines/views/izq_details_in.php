
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php echo icon("plus"); ?>
        <?php _t("Money in"); ?>
    </a>
    <a href="index.php?c=banks_lines" class="list-group-item"><?php _t("List bank lines"); ?></a>
    <?php
    foreach (banks_lines_search_ready_to_reconciliation_for('+') as $key => $bl) {

        $icon_selected_bl = ($bl['id'] == $id ) ? '    <span class="badge">' . icon('chevron-right') . '</span>' : "";

        echo '<a href="index.php?c=banks_lines&a=details&id=' . $bl['id'] . '&in_out=in" class="list-group-item">' . $bl['total'] . ' ' . $icon_selected_bl . '</a>';
    }
    ?>
</div>



