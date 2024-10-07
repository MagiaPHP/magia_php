<?php
# MagiaPHP 
# file date creation: 2023-09-13 
?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php
        include view("subdomains", "izq_add");
        echo "<hr>";
        echo "<hr>";
        $array = array(
            'sides' => array("l" => array(), "r" => array()),
        );

        array_push($array['sides']['l'], array("controller" => "contacts", "view" => "form_add"));
        array_push($array['sides']['l'], array("controller" => "subdomains", "view" => "form_add"));

        vardump($array['sides']);

//        vardump($array);
//        vardump(json_encode($array));
        echo "rrr";

//        $views = json_decode(_options_option('config_side_subdomains_add'), true);
        $views = $array;

//        vardump($views);
        vardump($views['sides']['l']);

        foreach ($views['sides']['l'] as $key => $value) {
            vardump($value);

            include view($value['controller'], $value['view']);
        }


        include view("subdomains", "izq_add");
        ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <h1>
            <?php _menu_icon("top", 'subdomains'); ?>
            <?php _t("Add subdomains"); ?>
        </h1>
        <?php include view("subdomains", "form_add"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("subdomains", "der_add"); ?>

    </div>
</div>

<?php include view("home", "footer"); ?>

