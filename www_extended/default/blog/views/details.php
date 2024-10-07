<?php
# MagiaPHP 
# file date creation: 2024-03-26 
?>
<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("blog", "izq_details"); ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <h1><?php echo $blog->getTitle(); ?></h1>

        <?php echo $blog->getDescription(); ?>

        /////////////////

        <script>
            ClassicEditor
                    .create(document.querySelector('#description'))

                    .catch(error => {
                        console.error(error);
                    });
        </script>












        <h3><?php _t("Comments"); ?></h3>

        <?php
        foreach (blog_comments_search_by('blog_id', $blog->getId()) as $key => $blogcl) {
            $comment = new Blog_comments();
            $comment->setBlog_comments($blogcl['id']);

            echo '<div class="panel panel-default">
                    <div class="panel-body">
                      <p>
                      <b>' . $comment->getTitle() . '</b><br>
                      ' . $comment->getComment() . '
                      </p>
                      <p><b>' . contacts_formated($comment->getAuthor_id()) . '</b> ' . $comment->getDate() . '</p>
                          
                        <p>
                            <a href="index.php?c=blog_comments&a=edit&id=' . $comment->getId() . '">' . _tr("Edit") . '</a> |
                            <a href="index.php?c=blog_comments&a=delete&id=' . $comment->getId() . '">' . _tr("Delete") . '</a>
                        </p>
                    </div>
                  </div>';
        }
        ?>


        <?php // include view("blog", "form_details"  , $arg = ["redi" => 1]  );  ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">

        <?php // include view("blog", "der_details"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
