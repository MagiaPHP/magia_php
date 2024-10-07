<?php
//vardump($params);
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">QR</h3>
    </div>
    <div class="panel-body">

        <div class="form-group">
            <label for="x">
                <span class="glyphicon glyphicon-arrow-left"></span> 

                X <?php _t("From left"); ?></label>
            <input 
                type="number" 
                class="form-control" 
                name="QR[x]" 
                id="x" 
                placeholder="<?php echo $params['QR']['x']; ?>" 
                value="<?php echo $params['QR']['x']; ?>">
        </div>

        <div class="form-group">
            <label for="x"><span class="glyphicon glyphicon-arrow-up"></span> Y <?php _t("From top"); ?></label>
            <input type="number" 
                   class="form-control" 
                   name="QR[y]" 
                   id="y" 
                   placeholder="<?php echo $params['QR']['y']; ?>" 
                   value="<?php echo $params['QR']['y']; ?>">
        </div>
        <hr>
        <div class="form-group">
            <label for="w">
                <span class="glyphicon glyphicon-resize-horizontal"></span> 
                <?php _t("QR width"); ?>
            </label>
            <input 
                type="number" 
                class="form-control" 
                name="QR[w]" 
                id="w" 
                placeholder="<?php echo $params['QR']['w']; ?>" 
                value="<?php echo $params['QR']['w']; ?>">
        </div>

        <div class="form-group">
            <label for="content"><?php _t("Content"); ?></label>
            <textarea class="form-control" name="QR_content" id="QR_content" rows="5"><?php echo $params['QR_content'] ?></textarea>

        </div>



        <div class="form-group">
            <label for="content"><?php _t("Background"); ?></label>


            <div class="row">

                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="r">
                            R 
                            (<?php echo $params['QR_background']['r'] ?>)

                        </label>
                        <input type="number" min="0" max="255" class="form-control" id="r" name="QR_background[r]" placeholder="255" 
                               value="<?php echo $params['QR_background']['r'] ?>" >
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="g">
                            G (<?php echo $params['QR_background']['g'] ?>)</label>
                        <input type="number" min="0" max="255" class="form-control" id="g" name="QR_background[g]" placeholder="255"
                               value="<?php echo $params['QR_background']['g'] ?>"
                               >
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="b">

                            B (<?php echo $params['QR_background']['b'] ?>)</label>
                        <input type="number" min="0" max="255" class="form-control" id="b" name="QR_background[b]" placeholder="255"
                               value="<?php echo $params['QR_background']['b'] ?>"
                               >
                    </div>
                </div>
            </div>
        </div>



        <div class="form-group">
            <label for="content"><?php _t("Color"); ?></label>
            <div class="row">

                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="r">
                            R 
                            (<?php echo $params['QR_color']['r'] ?>)

                        </label>
                        <input type="number" min="0" max="255" class="form-control" id="r" name="QR_color[r]" placeholder="255" 
                               value="<?php echo $params['QR_color']['r'] ?>" >
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="g">
                            G (<?php echo $params['QR_color']['g'] ?>)</label>
                        <input type="number" min="0" max="255" class="form-control" id="g" name="QR_color[g]" placeholder="255"
                               value="<?php echo $params['QR_color']['g'] ?>"
                               >
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="b">

                            B (<?php echo $params['QR_color']['b'] ?>)</label>
                        <input type="number" min="0" max="255" class="form-control" id="b" name="QR_color[b]" placeholder="255"
                               value="<?php echo $params['QR_color']['b'] ?>"
                               >
                    </div>
                </div>

            </div>
        </div>

        <hr>





        <div class="form-group">
            <label>
                <input 
                    type="checkbox" 
                    name="QR[hidden]" 
                    value="1"
                    <?php echo ($params['QR']['hidden'] ) ? ' checked="" ' : ""; ?>
                    > <?php _t("Hidden the QR code"); ?>
            </label>
        </div>


        <button type="submit" class="btn btn-primary">
            <?php _t("Send"); ?>
        </button>


    </div>
</div>