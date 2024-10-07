<?php

foreach ($yellow_pages as $key => $yp) {
    echo '<p>' . $yp['category'] . ' : <b><a href="' . $yp['url'] . '">' . $yp['label'] . '</a> </b> <br>' . $yp['url'] . '</br>';
    echo '' . $yp['description'] . '</br>';
    echo '<a href="index.php?c=yellow_pages&a=edit&id=' . $yp['id'] . '">edit</a>'; 
    echo '</p><br>';
}
?>

<?php // include view('yellow_pages', 'form_add'); ?>