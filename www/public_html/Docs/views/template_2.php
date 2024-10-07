<?php
$image = "www/gallery/img/blog/" . $article['images'];
$image_df = "www/gallery/img/blog/blog.png"
?>


<div class="row">

    <div class="col-md-4">

        <?php
        if (file_exists($image) && !is_dir($image)) {
            echo '<a href="' . $image . '" data-rel="prettyPhoto">';
            echo '<img src="' . $image . '" alt="" class="img-responsive img-thumbnail">';
            echo '</a>';
        } else {
            echo '<a href="' . $image_df . '" data-rel="prettyPhoto">';
            echo '<img src="' . $image_df . '" alt="" class="img-responsive img-thumbnail">';
            echo "</a>";
        }
        ?>

    </div>

    <div class="col-md-8">

        <h4>*-*
            <?php echo ($category['id']) ? $category['id'] . "_" : ""; ?>
            <?php echo ($sub_cat['id']) ? $sub_cat['id'] . "_" : ""; ?>
            <?php echo ($article['id']) ? $article['id'] . "" : ""; ?>
            <?php echo $article['title']; ?>
        </h4>
        <p> update: 2 feb 2021 <br> 
            <?php echo $article['body']; ?>
        </p>
        <p>
            <a href="https://docs.gestionmanager.com" target="_new">read on line</a>
        </p>

    </div>

</div>