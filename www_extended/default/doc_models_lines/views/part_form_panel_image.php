
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            **
        </h3>
    </div>
    <div class="panel-body">

        <div class="form-group">
            <label for="x">X <?php _t("From left"); ?></label>
            <input 
                type="number" 
                class="form-control" 
                name="Image[x]" 
                id="x" 
                placeholder="<?php echo $params['Image']['x']; ?>" 
                value="<?php echo $params['Image']['x']; ?>">
        </div>

        <div class="form-group">
            <label for="x">Y <?php _t("From top"); ?></label>
            <input type="number" 
                   class="form-control" 
                   name="Image[y]" 
                   id="y" 
                   placeholder="<?php echo $params['Image']['y']; ?>" 
                   value="<?php echo $params['Image']['y']; ?>">
        </div>

        <div class="form-group">
            <label for="w">
                <?php _t("Image width"); ?>
            </label>
            <input 
                type="number" 
                class="form-control" 
                name="Image[w]" 
                id="w" 
                placeholder="<?php echo $params['Image']['w']; ?>" 
                value="<?php echo $params['Image']['w']; ?>">
        </div>

        <div class="form-group">
            <label for="h">H <?php _t("height"); ?></label>
            <input 
                type="number" 
                class="form-control" 
                name="Image[h]" 
                id="h" 
                placeholder="<?php echo $params['Image']['h']; ?>" 
                value="<?php echo $params['Image']['h']; ?>">
        </div>



        <div class="form-group">
            <label for="angle">
                <?php _t("Rotation image, angle in degrees"); ?>
            </label>

            <input 
                type="number" 
                class="form-control" 
                name="Image[angle]" 
                id="Image[angle]" 
                placeholder="<?php echo $params['Image']['angle']; ?>" 
                value="<?php echo $params['Image']['angle'] ?? 0; ?>">


            <?php
            /**
             *             <select class="form-control" name="Image[angle]" id="Image[angle]">
              <?php
              for ($i = 0; $i <= 360; $i++) {
              $selectd_angle = ((int) $params['Image']['angle'] == $i ) ? ' selected ' : '';
              echo '<option value="' . $i . '" ' . $selectd_angle . '>' . $i . '</option>';
              }
              ?>
              </select>
             */
            ?>
        </div>

        <?php
//                vardump($params['Image']); 
//                vardump($params['Image']['angle']); 
        ?>




        <div class="form-group">
            <label for="type"><?php _t("Type"); ?></label>
            <select class="form-control" name="Image[type]">
                <option value="JPG">JPG</option>
                <option>JPEG</option>
                <option>PNG</option>
                <option>GIF</option>
            </select>
        </div>

        <div class="form-group">
            <label for="top"><?php _t("Link"); ?></label>
            <input 
                type="text" 
                class="form-control" 
                name="Image[link]" 
                id="link" 
                placeholder="<?php echo $params['Image']['link']; ?>" 
                value="<?php echo $params['Image']['link']; ?>">
        </div>

        <div class="form-group">
            <label>
                <input 
                    type="checkbox" 
                    name="Image[hidden]" 
                    value="1"
                    <?php echo (isset($params['Image']['hidden']) && $params['Image']['hidden'] ) ? ' checked="" ' : ""; ?>
                    > <?php _t("Hidden the image"); ?>
            </label>
        </div>


        <button type="submit" class="btn btn-default">Submit</button>


    </div>
</div>