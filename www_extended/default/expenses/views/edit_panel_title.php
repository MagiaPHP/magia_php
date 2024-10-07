
<div class="panel panel-default">
    <div class="panel-heading">        
        <?php _t("Title"); ?>            
        <a href="#"><?php echo icon("eye-close"); ?></a>                                
    </div>
    <div class="panel-body">
        <?php echo $expense->getTitle(); ?>



        <form class="form-horizontal">
            <div class="form-group">
                <label for="title" class="col-sm-1 control-label sr-only"><?php _t("Title"); ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" name="title"></textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-0 col-sm-10">
                    <button type="submit" class="btn btn-default">
                        w
                    </button>
                </div>
            </div>

        </form>




    </div>
</div>
