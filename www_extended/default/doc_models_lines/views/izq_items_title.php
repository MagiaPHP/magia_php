
<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Items title"); ?>
    </div>
    <div class="panel-body">

        <?php
        $data = array(
            "form" => array(
                "c" => "config",
                "a" => "ok_doc_models_items",
                "redi" => array("c" => "doc_models", "a" => "items_title")
            ),
            "label" => $items['label'],
            "x" => $items['x'],
            "y" => $items['y'],
            "w" => $items['w'],
            "h" => $items['h'],
            "txt" => $items['txt'],
            "border" => $items['border'],
            "ln" => $items['ln'],
            "align" => $items['align'],
            "fill" => $items['fill'],
            "link" => $items['link'],
            "hidden" => $items['hidden'],
        );

        doc_models_generate_cell($data);
        ?>
    </div>
</div>




<div class="panel panel-default">
    <div class="panel-heading"><?php _t("Items title"); ?></div>
    <div class="panel-body">

        <?php
        vardump($items);
        ?>

        <form method="POST" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_doc_models_items_title">

            <?php
            $items_title = array(
                "#" => "#",
                "qty" => "Qty",
                "description" => "Description",
                "price" => "Price",
                "subtotal" => "Subtotal",
                "discount" => "Discount",
                "etax" => "etax",
                "tax" => "tax",
                "itax" => "itax",
            );

            for ($i = 1; $i < count($items_title) + 1; $i++) {
                echo '
            <div class="form-group">
                <select class="form-control" name="line[' . $i . ']"><option></option>';
                foreach ($items_title as $key => $header_item) {

                    $selected = ($key == $items[$i] ) ? ' selected="" ' : "";

                    echo '<option value = "' . $key . '"  ' . $selected . '>' . $header_item . '</option > ';
                }

                echo '</select>            
            </div>';
            }
            ?>
            <option></option>





            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>


