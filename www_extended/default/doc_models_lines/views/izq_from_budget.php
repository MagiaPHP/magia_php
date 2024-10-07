<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("From budget"); ?>
    </div>
    <div class="panel-body">



        <?php
        $data = array(
            "form" => array(
                "c" => "config",
                "a" => "ok_doc_models_from_budget",
                "redi" => array("c" => "doc_models", "a" => "edit_from_budget")
            ),
            "label" => $data_from_db['label'],
            "x" => $data_from_db['x'],
            "y" => $data_from_db['y'],
            "w" => $data_from_db['w'],
            "h" => $data_from_db['h'],
            "txt" => $data_from_db['txt'],
            "border" => $data_from_db['border'],
            "ln" => $data_from_db['ln'],
            "align" => $data_from_db['align'],
            "fill" => $data_from_db['fill'],
            "link" => $data_from_db['link'],
            "hidden" => $data_from_db['hidden'],
        );

        doc_models_generate_cell($data);
        ?>

    </div>
</div>


