<?php 

vardump($config); 

if ($config) { ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <?php
            $arg = array(
                "redi" => 5,
                "c" => 'glosario',
                "a" => 'edit',
                //id=253&config=1&form_id=2&line_id=8
                "params" => "id=" . $glosario->getId() . "&config=1&form_id=$form_id&line_id=$line_id",
                "form_id" => $form_id,
                "line_id" => $line_id,
            );

            include view("magia_forms_lines", 'form_edit');
            ?>    
        </div>
    </div>
<?php } ?>

----------------