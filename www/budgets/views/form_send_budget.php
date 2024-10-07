

<form method="post" action="index.php">
    <input type="hidden" name="c" value="budgets">
    <input type="hidden" name="a" value="ok_send_by_email">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="form-group">
        <label for="from"><?php _t("From"); ?></label>
        <input
            type="email"
            class="form-control"
            id="from"
            placeholder=""
            value="<?php echo contacts_field_id("name", $u_id); ?> <?php echo contacts_field_id("lastname", $u_id); ?>"
            readonly=""
            >
    </div>

    <div class="form-group">
        <label for="to"><?php _t("To"); ?></label>
        <input
            type="text"
            class="form-control"
            id="to"
            placeholder=""
            value="<?php echo contacts_field_id("name", budgets_field_id("client_id", $id)); ?> <?php echo contacts_field_id("lastname", budgets_field_id("client_id", $id)); ?>"
            readonly=""
            >
    </div>

    <div class="form-group">
        <label for="subjet"><?php _t("Subjet"); ?></label>
        <input type="text" class="form-control" id="subjet" name="subjet" placeholder="" value="<?php echo $config_company_name; ?> <?php _t("budget"); ?> <?php echo $id; ?>">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1"><?php _t("Mensaje"); ?></label>
        <p><?php echo contacts_field_id("name", budgets_field_id("client_id", $id)); ?> <?php echo contacts_field_id("lastname", budgets_field_id("client_id", $id)); ?> <?php _t("prefers communication in"); ?> <?php echo users_field_contact_id("language", budgets_field_id("client_id", $id)) ?></p>
        <textarea class="form-control" rows="10" >Estimado sr.
  Aqui tiene la factura que ha pedido

  Robinson Coello
  +32 474 62 47 07
        </textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox"> Check me out
        </label>
    </div>
    <button type="submit" class="btn btn-default"><?php _t("Send"); ?></button>
</form>