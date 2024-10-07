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
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Frase"); ?></th>
            <th><?php _t("Contexto"); ?></th>
            <th width="50%"><?php echo ($u_language); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Frase"); ?></th>
            <th><?php _t("Contexto"); ?></th>
            <th><?php echo ($u_language); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            $i = 1;
            foreach ($_content as $_content_item) {

//                varsdump($_content_item["frase"]);

                $translation = (_translations_search_by_content_language($_content_item["frase"], $u_language)['translation'] ) ?? false;

//                vardump($translation);


                $form = '<form method="post" action="index.php" class="form-inline">
    <input type="hidden" name="c" value="_translations">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="content" value="' . $_content_item["frase"] . '">
    <input type="hidden" name="language" value="' . $u_language . '">
    <input type="hidden" name="redi" value="3">

    <div class="form-group">
                
            <input 
            type="text" 
            class="form-control" 
            name="translation"
            value="' . $translation . '"
            >

    </div>

    <button type="submit" class="btn btn-primary">
        ' . _tr("Update") . '
    </button>
</form>';

                echo "<tr id=\"$_content_item[id]\">";
                echo "<td>$i</td>";
                echo "<td>$_content_item[id]</td>";
                echo "<td>$_content_item[frase]</td>";
                echo "<td>$_content_item[contexto]</td>";
                echo "<td>$form</td>";
                $i++;
            }
            ?>	
        </tr>
    </tbody>
</table>

