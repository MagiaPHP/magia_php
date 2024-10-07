<div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#orders_by_contacts" aria-controls="orders_by_contacts" role="tab" data-toggle="tab">
                <?php _t("Last orders"); ?>
            </a>
        </li>
        <li role="presentation">
            <a href="#directory_contacts" aria-controls="directory_contacts" role="tab" data-toggle="tab">
                <?php _t("Data info"); ?>
            </a>
        </li>


    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="orders_by_contacts">
            <?php include "orders_by_contacts.php"; ?>                
        </div>
        <div role="tabpanel" class="tab-pane" id="directory_contacts">
            <?php include "directory_contacts.php"; ?>    
        </div>

    </div>

</div>