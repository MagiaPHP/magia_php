
<?php
# MagiaPHP 
# file date creation: 2024-06-12 
?>
<tr>

<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_clothes">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_sizes_clothes">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">



    <td>
        <select 
            name="employee_sizes_clothes_id" 
            class="form-control" 
            id="employee_sizes_clothes_id" 
            >
                <?php // hr_employee_sizes_clothes_select("id", array("id"), "", array()); ?>                        

            <?php
            foreach (hr_employee_sizes_clothes_search_by('employee_id', $id) as $key => $hrescbbyem) {
                echo '<option value="' . $hrescbbyem['id'] . '">' . hr_clothes_field_code('name', $hrescbbyem['clothes_code']) . ' : ' . $hrescbbyem['size'] . '</option>';
            }
            ?>

        </select>       
    </td>

    <td>
        <input 
            type="date" 
            name="date_of_delivery" 
            class="form-control" 
            id="date_of_delivery" 
            placeholder="date_of_delivery" 
            value="" 
            required=""
            >
    </td>


    <td>
        <textarea name="notes" class="form-control" id="notes" placeholder="<?php _t("Notes"); ?>" ></textarea>    
    </td>



    <td>
        <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
    </td>



</form>

<tr>