<h3>
    <?php _t("List of sections (controllers) where you have `read` permission"); ?>

</h3>


<ol>
    <?php
    foreach (permissions_search_by_rol($u_rol) as $key => $psbr) {
        echo '<li>' . $psbr['controller'] . '</li>';
    }
    ?>
</ol>