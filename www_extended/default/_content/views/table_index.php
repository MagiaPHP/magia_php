<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>


<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Frase"); ?></th>
            <th><?php _t("Contexto"); ?></th>
            <th><?php _t("Translation"); ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            $i = 1;
            foreach ($_content as $_content_item) {
                echo "<tr id=\"$_content_item[id]\">";
                //echo "<td>$i</td>";
                echo "<td>$_content_item[id]</td>";
                //echo "<td>" . mb_detect_encoding($_content_item['frase']) . "</td>";
                echo "<td>$_content_item[frase]</td>";
                echo "<td>$_content_item[contexto]</td>";
                echo '<td><form method="post" action="index.php">
    <input type="hidden" name="c" value="_translations">
    <input type="hidden" name="a" value="ok_push">
    <input type="hidden" name="redi" value="2">
    
    <input class="form-control" type="text" name="" id="" placeholder="" value="">
    
</form></td>';
                echo "</tr>";
                $i++;
            }
            ?>	
        </tr>
    </tbody>

</table>



