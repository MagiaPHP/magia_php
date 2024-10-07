<form class="form-horizontal"  action ="index.php" method ="post" >

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_employee_delete">    
    <input type="hidden" name="employee_id" value="<?php echo $employees_list_by_company['contact_id']; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="redi" value="1">

    <div class="form-group">
        <label class="control-label col-sm-1" for="Delete"></label>
        <div class="col-sm-10">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>  

</form>


