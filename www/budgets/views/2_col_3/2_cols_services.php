<ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="#"><?php _t("Services") ?></a></li>
    <li role="presentation"><a href="#"><?php _t("Products"); ?></a></li>
    <?php
    foreach (services_categories_without_father() as $key => $scl) {
        echo '<li role="presentation"><a href="#">' . $scl["category"] . '</a></li>';
    }
    ?>
</ul>




