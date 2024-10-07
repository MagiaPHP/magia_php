<hr>

<h4>
    <?php echo ($category['id']) ? $category['id'] . "_" : ""; ?>
    <?php echo ($sub_cat['id']) ? $sub_cat['id'] . "_" : ""; ?>
    <?php echo ($article['id']) ? $article['id'] . "" : ""; ?>
    <?php echo $article['title']; ?>
</h4>

<p>

    <?php echo $article['body']; ?>

</p>

<a href="#" class="btn btn-primary">Get a Installation Service</a> <a href="#" class="btn btn-info">Ask a Question</a>
<hr>