
<table class="table table-bordered">
    <tr>
        <td>Code</td>
        <td>Section</td>
        <td>Category</td>
        <td>Service</td>
    </tr>
</table>


<?php

foreach (services_sections_list() as $key => $ssl) {
    echo '<h3>' . $ssl['code'] . ' . ' . $ssl['section'] . '</h3>';
}
?>