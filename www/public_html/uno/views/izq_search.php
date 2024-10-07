<h4>

    <?php _t("Topics"); ?>
</h4>


<p><a href="index.php" class=""><span class="glyphicon glyphicon-home"></span> <?php _t("Home"); ?></a></p>



<?php
foreach (blog_unique_from_col("controller") as $controller) {
    if ($controller['controller'] != "") {
        echo '<p><a href="index.php?c=public_html&a=search&w=by_controller&controller=' . $controller['controller'] . '" class=""><span class="glyphicon glyphicon-file"></span> ' . $controller['controller'] . '</a></p>';
    }
}
?>


<?php
//foreach (blog_search_by('controller', $blog->getController()) as $key => $bsb) {
//    echo '<p><a href="index.php?c=public_html&a=details&id=' . $bsb['id'] . '">' . $bsb['title'] . '</a></p>';
//}
?>