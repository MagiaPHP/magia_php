<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Actions"); ?>
        </h3>
    </div>
    <div class="panel-body">


        <form method="get" action="index.php" target="print">
            <input type="hidden" name="c" value="app">
            <input type="hidden" name="a" value="p_b">
            <input type="hidden" name="doc" value="b">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="code" value="<?php echo $code; ?>">
            <input type="hidden" name="passweb" value="<?php echo 20; ?>">
            <input type="hidden" name="way" value="pdf">


            <div class="form-group">
                <label for="exampleInputPassword1"><?php _t("Language print"); ?></label>
                <select class="form-control" name="lang">
                    <?php
                    foreach (_languages_list_by_status(1) as $key => $lang) {
                        $selected = ($lang['language'] == contacts_field_id('language', $invoices['client_id'])) ? " selected " : "";
                        echo '<option value="' . $lang['language'] . '" ' . $selected . ' >' . _tr($lang['name']) . '</option>';
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-default">
                <span class="gl glyphicon glyphicon-print"></span>
                <?php _t("Print"); ?>
            </button>
        </form>


    </div>
</div>

<?php if ($budget->getStatus() == 20) { ?>

    <div class="panel panel-primary">
        <div class="panel-heading"><?php _t("Accept this budget"); ?></div>
        <div class="panel-body">
            <h2><?php _t("Accept"); ?></h2>
            <form action="index.php" method="post">
                <input type="hidden" name="c" value="app">
                <input type="hidden" name="a" value="ok_accept">                                    
                <input type="hidden" name="id" value="<?php echo "$id"; ?>">
                <input type="hidden" name="code" value="<?php echo "$code"; ?>">
                <div class="form-group">
                    <label for="cn"><?php _t("Your client number"); ?></label>

                    <input 
                        type="text" 
                        class="form-control" 
                        id="cn" 
                        name="cn" 
                        placeholder="<?php _t("Write here you client number"); ?>"
                        value=""
                        required=""
                        >

                </div>
                <div class="checkbox">
                    <label>
                        <input 
                            type="checkbox" 
                            required=""
                            name="is_ok"
                            > <?php _t("Yes, i accept this budget"); ?> 
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    <?php _t("Click here to accept this budget"); ?>
                </button>
            </form>
        </div>
    </div>


<?php }
?>