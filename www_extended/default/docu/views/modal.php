<a href="#" data-toggle="modal" data-target="#myModal"><?php echo icon('question-sign'); ?></a>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <?php _t("Help"); ?>
                </h4>
            </div>
            <div class="modal-body">


                <?php
                $docu = new Docu();
                $docu->setDocu($arg);
                ?>

                <h2><?php echo $docu->getTitle(); ?></h2>
                <p>
                    <?php echo $docu->getPost(); ?>
                </p>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
