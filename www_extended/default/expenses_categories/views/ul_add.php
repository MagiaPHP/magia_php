<ul>
    <?php
    foreach (expenses_categories_without_father() as $key => $eclwf) {
        $ecat = new Expenses_categories();
        $ecat->setExpenses_categories($eclwf['id']);

        echo '<li>' . $ecat->getCode() . ' ' . $ecat->getCategory() . '</li>';

        echo '' . expenses_categories_child_li($ecat->getCode()) . '';
    }
//    echo '<li>+</li>';
    ?>
</ul>










