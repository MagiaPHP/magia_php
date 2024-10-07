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




<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Content"); ?></th>
            <th><?php _t("Language"); ?></th>
            <th><?php _t("Translation"); ?></th>                                                                       
            <th><?php _t("Update"); ?></th>                                                                      
            <th><?php _t("Delete"); ?></th>                                                                      
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Content"); ?></th>
            <th><?php _t("Language"); ?></th>
            <th><?php _t("Translation"); ?></th>                                                                       
            <th width="30%"><?php _t("Update"); ?></th>                                                                      
            <th><?php _t("Dalete"); ?></th>                                                                      
        </tr>
    </tfoot>

    <tbody>


        <tr>
            <?php
            foreach ($_translations as $_translation_items) {

//                vardump($_translation_items);

                $content = str_replace($txt, "<b class='text-primary'>$txt</b>", $_translation_items['content']);
                $translation = str_replace($txt, "<b class='text-primary'>$txt</b>", $_translation_items['translation']);
                //
                //
                //

                echo "<tr id=\"$_translation_items[id]\">";
                echo "<td>$_translation_items[id]</td>";
//                echo "<td>$_translation_items[content]</td>";
                echo "<td>$content</td>";
                echo "<td>" . _languages_field_language('name', $_translation_items['language']) . "</td>";
//                echo "<td>$_translation_items[translation]</td>";
                echo "<td>$translation</td>";

//                echo "<td>$menu</td>";

                echo '<td>
<form method="post" action="index.php"  class="form-inline">
    <input type="hidden" name="c" value="_translations">
    <input type="hidden" name="a" value="ok_update">
    
    <input type="hidden" name="id" value="' . $_translation_items["id"] . '">    
  
    <input type="hidden" name="content" value="' . $_translation_items["content"] . '">    
    <input type="hidden" name="language" value="' . $u_language . '">  
<input type="hidden" name="redi" value="2">
    
<input type="text" class="form-control" name="translation" id="translation" placeholder="" value="' . $_translation_items["translation"] . '">
    
<button type="submit" class="btn btn-sm  btn-primary">' . _tr("Update") . '</button>
  

</form></td>';
                echo '<td><a class="btn btn-danger" href="index.php?c=_translations&a=delete&id=' . $_translation_items["id"] . '&redi=2">' . _tr("Delete") . '</a></td>';
                echo "</tr>";
            }
            ?>	
        </tr>
    </tbody>
</table>




