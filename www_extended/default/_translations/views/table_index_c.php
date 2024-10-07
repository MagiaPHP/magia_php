<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

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






<?php
//vardump(_content_search_starts_with('o')); 
?>


<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><span class="glyphicon glyphicon-trash"></span></th>
            <th><?php _t("Frase"); ?></th>
            <th><?php _t("Contexto"); ?></th>
            <th><?php _t("Translation"); ?> (<?php echo ($u_language); ?>)</th>
            <th><?php _t("Update"); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr class="info">
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><span class="glyphicon glyphicon-trash"></span></th>
            <th><?php _t("Frase"); ?></th>
            <th><?php _t("Contexto"); ?></th>
            <th><?php _t("Translation"); ?> (<?php echo ($u_language); ?>)</th>
            <th width="30%"><?php _t("Update"); ?></th>
        </tr>
    </tfoot>

    <tbody>


        <tr>
            <?php
            $i = 1;
            $class_no_tr = null;

            foreach ($_content as $_con) {

                $frase = str_replace($txt, "<b class='text-primary'>$txt</b>", $_con['frase']);

                $contexto = $_con['contexto'];

                $translation = _translations_search_by_content_language($_con['frase'], $u_language)["translation"] ?? false;

                if (!$translation) {
                    $class_no_tr = "danger";
                }




                $form = '<form method="post" action="index.php" class="form-inline">
    <input type="hidden" name="c" value="_translations">
    <input type="hidden" name="a" value="ok_push">
    <input type="hidden" name="content" value="' . $_con["frase"] . '">
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

    <button type="submit" class="btn btn-' . $class_no_tr . '">
        ' . _tr("Save") . '
    </button>
</form>';

//              
                echo "<tr id=\"$_con[id]\"  class='$class_no_tr'>";
                echo "<td>$i</td>";
                echo "<td>$_con[id]</td>";
                echo '<td><a href="#"><span class="glyphicon glyphicon-trash"></span></a></td>';
                echo "<td>$frase</td>";
                echo "<td>$contexto</td>";

                echo "<td>$translation</td>";
                echo "<td>$form</td>";

                echo "</tr>";
                $i++;
                $class_no_tr = null;
            }
            ?>	
        </tr>
    </tbody>
</table>




