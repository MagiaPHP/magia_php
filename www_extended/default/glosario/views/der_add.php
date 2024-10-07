<?php if ($config) { ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <?php
            $arg = array(
                "redi" => 5,
                "c" => 'glosario',
                "a" => 'add',
                "params" => "&config=1&form_id=$form_id&line_id=$line_id",
                "form_id" => $form_id,
                "line_id" => $line_id,
            );

            include view("magia_forms_lines", 'form_add');
            ?>    
        </div>
    </div>
<?php } ?>