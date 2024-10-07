
<form role="form"  method="post">  

    <input type="hidden" name="c" value="comments">
    <input type="hidden" name="a" value="ok_comments_add">
    <input type="hidden" name="doc" id="doc"  value="<?php echo $c; ?>">
    <input type="hidden" name="doc_id" id="doc_id"  value="<?php echo $id; ?>">

    <input type="hidden" name="redi[redi]"      id="redi"  value="<?php echo isset($args['redi']) ? $args['redi'] : "5"; ?>">
    <input type="hidden" name="redi[c]"         id="redi"  value="<?php echo isset($args['c']) ? $args['c'] : $c; ?>">
    <input type="hidden" name="redi[a]"         id="redi"  value="<?php echo isset($args['a']) ? $args['a'] : $a; ?>">
    <input type="hidden" name="redi[params]"    id="redi"  value="<?php echo isset($args['params']) ? $args['params'] : "id=$id"; ?>">


    <div class="row">
        <div class="col-xs-12">
            <div class="input-group input-group-lg">
                <div class="input-group-btn">
                    <?php //echo contacts_picture($u_id, 30); ?>
                </div>
                <input type="text" class="form-control"  id="comment" 
                       name="comment" 
                       message="comment" 
                       placeholder="<?php _t("The comments you write here are visible to the customer"); ?>"

                       />
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><?php _t("Send"); ?></button>
                </div>
            </div>
        </div>
    </div>

</form>


