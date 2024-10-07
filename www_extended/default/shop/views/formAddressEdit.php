<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_address_new">        
    <input type="hidden" name="region" value="null">  
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">  


    <?php
    include "formAddressUpdate.php";
    ?>                
</form>
