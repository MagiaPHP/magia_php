<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<?php echo docu_modal($c); ?>

<nav aria-label="...">
    <ul class="pagination">
        <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
        <?php
        $abc = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789$-_%";
        $i = 0;
        while ($i < strlen($abc)) {
            $active = ($abc[$i] == $l) ? "active" : "";
            echo '<li class="' . $active . '"><a href="index.php?c=_translations&a=search&w=start_with&l=' . $abc[$i] . '">' . $abc[$i] . '<span class="sr-only">(current)</span></a></li>';
            $i++;
        }
        ?>

    </ul>
</nav>



<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><span class="glyphicon glyphicon-trash"></span></th>
            <th width="40%"><?php _t("Frase"); ?></th>
            <th><?php _t("Contexto"); ?></th>
            <th><?php _t("Translation"); ?> (<?php echo ($u_language); ?>)</th>
            <th><?php _t("Update"); ?></th>

        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><span class="glyphicon glyphicon-trash"></span></th>
            <th><?php _t("Frase"); ?></th>
            <th><?php _t("Contexto"); ?></th>
            <th><?php _t("Translation"); ?> (<?php echo ($u_language); ?>)</th>
            <th><?php _t("Update"); ?></th>
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            $i = 1;

            $has_tr = false;
            $translation = '';
            foreach ($_translation as $_trans) {

                if ($u_language == 'en_GB') {
                    $translation = $_trans["frase"];
                }


                $form = '<form method="post" action="index.php" class="form-inline">
    <input type="hidden" name="c" value="_translations">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="content" value="' . $_trans["frase"] . '">
    <input type="hidden" name="language" value="' . $u_language . '">
    <input type="hidden" name="redi" value="2">

    <div class="form-group">
                
            <input 
            type="text" 
            class="form-control" 
            name="translation"
            value="' . $translation . '"
            >

    </div>

    <button type="submit" class="btn btn-primary">
        ' . _tr("Add") . '
    </button>
</form>';

                if (_translations_by_content($_trans["frase"])) {
                    $has_tr = true;
                }

                echo "<tr id=\"$_trans[id]\">";
                echo "<td>$i</td>";
                echo "<td>$_trans[id]</td>";
                echo '<td><a href="index.php?c=_content&a=ok_delete&frase=' . $_trans["frase"] . '&redi=1"><span class="glyphicon glyphicon-trash"></span></a></td>';
                echo "<td>$_trans[frase]</td>";
                echo "<td>$_trans[contexto]</td>";
                echo "<td></td>";
                echo "<td>$form</td>";
                $i++;
            }
            ?>	
        </tr>
    </tbody>
</table>


