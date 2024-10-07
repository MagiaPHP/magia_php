<form action="index.php" method="get">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="contacts_update">    
    <input type="hidden" name="id" value="<?php echo $contact["id"]; ?>">    

    <div class="form-group">
        <label for="name"><?php _t("Id"); ?></label>
        <input type="text"  name="id" class="form-control" id="id" value="" >
    </div>



    <div class="form-group">
        <label for="name"><?php _t("Name"); ?></label>
        <input type="text"  name="name" class="form-control" id="name" value="<?php echo $contact['name']; ?>" >
    </div>

    <div class="form-group">
        <label for="lastname"><?php _t("Lastname"); ?></label>
        <input type="text"  name="lastname" class="form-control" id="lastname" value="<?php echo $contact['lastname']; ?>"  >
    </div>


    <div class="form-group">
        <label for="lastname"><?php _t("Birthdate"); ?></label>
        <input type="text"  name="" class="form-control"  value="<?php echo $contact['birthdate']; ?>" >
    </div>



    <div class="form-group">
        <label for="name"><?php _t("National naumber"); ?></label>
        <input type="text"  name="id" class="form-control" id="id" value="" >
    </div>


    <button type="submit" class="btn btn-default"><?php _t("Edit"); ?></button>
</form>

