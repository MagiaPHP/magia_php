
<?php

foreach (gallery_search_by_controller_doc_id('balance', $id) as $key => $doc_file) {

    $file = PATH_GALLERY . '/' . $doc_file["name"];

    echo '<img
  src="' . $file . '"
  alt="Example image"
  style="border: 1px solid black; padding: 10px;"
  width="100%"
  >';
}
?>