
<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
    <div class="list-group">

        <?php
        foreach (country_provinces_list_by_country($config_country) as $province) {

            $chulo = ($province['province'] == $config_province) ? ' <span class="glyphicon glyphicon-ok"></span> ' : "";

            echo '<a href="https://eventos-en-' . strtolower(url_amigable($province['province'])) . '.eventosenecuador.com" class="list-group-item">' . $chulo . ' ' . $province['province'] . '</a>';
        }
        ?>
    </div>
</div>