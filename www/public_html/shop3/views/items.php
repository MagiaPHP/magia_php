<?php
$i = 0;
foreach (products_list() as $key => $products_list) {
    $product = new Products();
    $product->setProducts($products_list['id']);
    ?>

    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="https://picsum.photos/200/20<?php echo $i++; ?>" alt="...">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading"><a href="index.php?c=public_html&a=details&id=<?php echo $product->getId(); ?>"><?php echo $product->getName(); ?></a></h4>
            <h3><?php echo moneda($product->getPrice()); ?></h3>
        </div>
    </div>

<?php }
?>





<?php
/**
 * 
  <div class="row">

  <?php
  $i = 0;
  foreach (products_list() as $key => $products_list) {
  $product = new Products();
  $product->setProducts($products_list['id']);
  ?>
  <div class="col-sm-6 col-md-3">
  <div class="thumbnail">
  <img src="https://picsum.photos/200/20<?php echo $i++; ?>" alt="...">
  <div class="caption">
  <h3>
  <a href="index.php?c=public_html&a=details&id=<?php echo $product->getId(); ?>">
  <?php echo $product->getName(); ?>
  </a>
  </h3>
  <p>...</p>
  <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
  </div>
  </div>
  </div>
  <?php }
  ?>
  </div>
 */
?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>