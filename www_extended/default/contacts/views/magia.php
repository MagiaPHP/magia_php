<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <div class="list-group">
            <a href="#" class="list-group-item active">
                Magia
            </a>
            <a href="#add" class="list-group-item">Add</a>
            <a href="#edit" class="list-group-item">Morbi leo risus</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
        </div>
    </div>
    <div class="col-lg-6">




        <h1>Table: </h1>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Field"); ?></th>
                    <th><?php _t("Type"); ?></th>
                    <th><?php _t("Null"); ?></th>
                    <th><?php _t("Key"); ?></th>
                    <th><?php _t("Default"); ?></th>
                    <th><?php _t("Extra"); ?></th>

                </tr>
            </thead>
            <tbody>
                <tr>

                    <?php
                    foreach ($campos as $key => $campo) {

                        echo "<tr>";
                        echo "<td>$key</td>";
                        echo "<td>$campo[Field]</td>";
                        echo "<td>$campo[Type]</td>";
                        echo "<td>$campo[Null]</td>";
                        echo "<td>$campo[Key]</td>";
                        echo "<td>$campo[Default]</td>";
                        echo "<td>$campo[Extra]</td>";

                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Owner"); ?></th>
                    <th><?php _t("Type"); ?></th>

                    <th><?php _t("Name"); ?></th>
                    <th><?php _t("Lastname"); ?></th>
                    <th><?php _t("Birthday"); ?></th>                    
                    <th><?php _t("Rol"); ?></th>                    
                    <th><?php _t("Status"); ?></th>                                          
                </tr>
            </tfoot>
        </table>





























        <h3><a name="add">Add Controller</a></h3>



        <form>

            <?php
            /*
              echo "<tr>";
              echo "<td>$key</td>";
              echo "<td>$campo[Field]</td>";
              echo "<td>$campo[Type]</td>";
              echo "<td>$campo[Null]</td>";
              echo "<td>$campo[Key]</td>";
              echo "<td>$campo[Default]</td>";
              echo "<td>$campo[Extra]</td>";


              echo "</tr>";
             * 
             * 
             */






            foreach ($campos as $key => $campo) {

                echo '<div class="form-group">
                <label for="exampleInputPassword1">' . $campo['Field'] . '</label>
                <input type="text" name ="' . $campo['Field'] . '" class="form-control" id="' . $campo['Field'] . '" placeholder="">
              </div>';
            }
            ?>	
            <button type="submit" class="btn btn-default">Submit</button>

        </form>






        <br>
        <br>
        <br>
        <br>










        <?php
        $add = '<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
  <button type="submit" class="btn btn-default">Submit</button>
</form>  ';
        ?>




        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo $add; ?>
            </div>
        </div>


        <h3>Code</h3>

        <textarea cols="100" rows="30"><?php echo $add; ?></textarea>






    </div>
</div>

<?php include view("home", "footer"); ?>  

