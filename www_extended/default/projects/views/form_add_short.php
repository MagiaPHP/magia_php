                

<form method="post" action="index.php">

    <input type="hidden" name="c" value="projects">
    <input type="hidden" name="a" value="ok_add_short">
    <input type="hidden" name="redi[redi]" value="2">

    <div class="form-group">
        <label for="name"><?php _t("Project name"); ?></label>
        <input 
            type="text" 
            class="form-control" 
            id="name" 
            name="name"
            placeholder="<?php _t("Very short description"); ?>"
            >
    </div>

    <div class="form-group">
        <label for="contact_id"><?php _t("My contacts list"); ?></label>

        <select class="form-control selectpicker" data-live-search="true" name="contact_id" required="">                                                                                                       
            <?php
//                                    foreach (offices_list_of_headoffices() as $key => $oloho) {
//            foreach (contacts_list_headoffice_without_my_company() as $key => $oloho) {
            foreach (contacts_list() as $key => $oloho) {
//                                        $headoffice = new Contacts();
//                                        $headoffice->setContact($oloho['id']);
                echo '<option value="' . $oloho['id'] . '">' . $oloho['id'] . ' -  ' . contacts_formated($oloho['id']) . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="description" class="sr-only"><?php _t("Description"); ?></label>                                
        <textarea class="form-control" name="description" placeholder="<?php _t("Description"); ?>"></textarea>
    </div>

    <button type="submit" class="btn btn-default">
        <?php echo icon("plus"); ?>
        <?php _t("Add"); ?>
    </button>


</form>