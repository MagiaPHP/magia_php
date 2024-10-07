
<div class="row">

    <?php
    foreach ($employees_list as $key => $emp) {
//        vardump($emp);
        ?>
        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
            <div class="thumbnail">
                <img src="<?php echo contacts_picture_src($emp['contact_id']); ?>" alt="...">
                <div class="caption">
                    <h3><?php echo contacts_formated($emp['contact_id']); ?></h3>
                    <h4><?php echo ($emp['cargo']); ?></h4>
                    <p><?php echo contacts_formated($emp['company_id']); ?></p>
                    <p>
                        <a href="index.php?c=contacts&a=details&id=<?php echo $emp["contact_id"]; ?>" class="btn btn-primary" role="button"><?php _t("Details"); ?></a> 
                    </p>
                </div>
            </div>
        </div>
    <?php } ?>




</div>

