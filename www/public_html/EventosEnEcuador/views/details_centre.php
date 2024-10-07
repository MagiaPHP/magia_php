<div class="page-header">
    <h1><?php echo $agenda['title']; ?> <small><?php echo $agenda['category_id']; ?></small></h1>
</div>


<img src="https://picsum.photos/500/500" alt="..." class="img img-responsive">

<h3>
    <a href="index.php?c=public_html&a=search&w=by_category_id&category_id=<?php echo $agenda['category_id']; ?>"><?php echo _tr(agenda_categories_field_id('category', $agenda['category_id'])); ?></a>
</h3>

<p>
    <?php echo $agenda['description']; ?>

</p>



