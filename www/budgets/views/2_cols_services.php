<ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="#"><?php _t("Services") ?></a></li>
    <?php
    foreach (services_sections_list() as $key => $ssl) {
        echo '<li role="presentation"><a href="#">' . $ssl["section"] . '</a></li>';
    }
    ?>
</ul>


<div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        Dropdown
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <li><a href="#">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">Separated link</a></li>
    </ul>
</div>
<br>
<form class="form-inline">
    <div class="form-group">
        <label class="sr-only" for="exampleInputEmail3">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
    </div>
    <div class="form-group">
        <label class="sr-only" for="exampleInputPassword3">Password</label>
        <select class="form-control">
            <option value="all"><?php _t("All"); ?></option>
            <option value="0"><?php _t("Travaux preparatoire"); ?></option>
        </select>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox"> Remember me
        </label>
    </div>
    <button type="submit" class="btn btn-default">Sign in</button>
</form>


<br>



<table class="table table-bordered">
    <thead>
        <tr>
            <th><?php _t("Code"); ?></th>
            <th><?php _t("Service"); ?></th>
        </tr>
    </thead>
    <tbody>


        <?php
        foreach (services_list() as $key => $s_list) {
            echo '<tr>
            <td>1020</td>
            <td>Renovacion Facada</td>
            <td>
                <select class="form-control">
                    <option value="all">Forfait <?php echo moneda(1200); ?></option>
                    <option value="all">Mt <?php echo moneda(500); ?></option>
                    <option value="all">M3 <?php echo moneda(300); ?></option>
                    <option value="all">Add price later</option>
                </select>
            </td>

            <td>
                <button type="submit" class="btn btn-default">Add</button>
            </td>
        </tr>
';
        }
        ?>





    </tbody>
</table>
