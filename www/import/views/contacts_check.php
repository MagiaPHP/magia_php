<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-0">
        <?php // include view("import", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php // include view("import", "nav"); ?>



        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h2><?php _t("Import contacts"); ?></h2>
        <?php include "form_contacts.php"; ?>


        <?php
        if (isset($check) && $check == 1) {


//            foreach ($items_list as $key) {
//                echo '    function set' . ucfirst($key) . '($' . $key . ') {<br>';
//                echo '$this->_' . $key . ' =  $' . $key . '; <br>';
//                echo "}<br>";
//            }
//
//            foreach ($items_list as $value) {
//                echo 'function get' . ucfirst($value) . '() { <br>';
//                echo '        return $this->_' . $value . '; <br>';
//                echo '} <br>';
//            }
//            foreach ($items_list as $value) {
//                echo 'function check' . ucfirst($value) . '($' . $value . ') { <br>';
//                echo '$res = array();<br>';
//                echo '    if(empty($'.$value.')){ <br>';
//                echo 'array_push($res, "'.$value.' is mandatory"); <br>';
//                echo '} <br>';
////                echo '        return $this->_' . $value . '; <br>';
//                echo 'return $res; <br>';
//                echo '} <br>';
//            }

            include "check_contacts.php";
        }
        ?>



    </div>
</div>

<?php include view("home", "footer"); ?> 

