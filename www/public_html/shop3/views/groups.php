<?php include "header.php"; ?>  

<?php include "nav.php"; ?>

<div class="container">

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <?php
            if ($_REQUEST) {
                foreach ($error as $key => $value) {
                    message("info", "$value");
                }
            }
            ?>
            <h1>Grupos</h1>

            <ul>
                <?php
                foreach (products_groups_list_without_father() as $key => $products_groups_list_without_father) {
                    echo '<li><b>' . $products_groups_list_without_father["name"] . '</b></li>';

                    echo '<ul>';
                    foreach (products_groups_list_by_father($products_groups_list_without_father["id"]) as $key => $products_groups_list_by_father) {
                        echo '<li><b>' . $products_groups_list_by_father["name"] . '</b></li>';

                        //////////// categorias
                        echo "<ul>";
                        foreach (products_categories_list_by_group_without_father($products_groups_list_by_father["id"]) as $key => $products_categories_list_by_group) {
                            echo '<li>' . $products_categories_list_by_group["name"] . '</li>';

                            echo '<ul>';
                            foreach (products_categories_list_by_category($products_categories_list_by_group["id"]) as $key => $products_categories_list_by_category) {
                                echo '<li>' . $products_categories_list_by_category["name"] . '</li>';
                            }
                            echo '</ul>';
                        }
                        echo "</ul>";
                    }
                    echo "</ul>";
                }
                ?>
            </ul>







        </div>

    </div>
</div>

<?php include ("footer.php"); ?> 

