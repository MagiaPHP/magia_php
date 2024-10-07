<?php

//vardump($event);

echo '            
   <div class="col-sm-6 col-md-6">
    <div class="thumbnail">
      <img src="https://picsum.photos/450/24' . $i++ . '" alt="...">
      <div class="caption">
        <h3><a href="index.php?c=public_html&a=details&id=' . $event["id"] . '" >' . $event["title"] . '</a></h3>
        <p>' . $event['date'] . ' 18h - ' . $event['city'] . '</p>
        <p><a href="index.php?c=public_html&a=search&w=by_category_id&category_id=' . $event['category_id'] . '">' . _tr(agenda_categories_field_id('category', $event['category_id'])) . '</a></p>
      </div>
    </div>
  </div>';

if ($i > 9) {
    $i = 0;
}
