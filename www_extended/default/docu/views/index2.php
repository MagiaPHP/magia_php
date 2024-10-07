<?php include view("home", "header"); ?>  

<?php include view("docu", "nav"); ?>

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("docu", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">
        <?php //include view("docu", "nav"); ?>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        /**
         * Temas  : 
         *  orders
         *  invoices
         *  budgets
         * 
         * 
         */
        $temas = array(
            "id" => "1",
            "tema" => "orders",
            "module" => "audio",
            "order_by" => "1",
            "status" => "1",
        );

        vardump($temas);
        ?>





        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


























        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Orders</div>
            <div class="panel-body">
                <p>...</p>
            </div>

            <!-- List group -->
            <ul class="list-group">
                <li class="list-group-item"><a href="index.php?c=docu&a=details&id=1">Modify a order</a></li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>

        <?php // include view("docu", "table_index");  ?>

    </div>
    <div class="col-lg-2">
        <?php //include view("docu", "nav");  ?>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Invoices</div>
            <div class="panel-body">
                <p>...</p>
            </div>

            <!-- List group -->
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>

        <?php // include view("docu", "table_index");  ?>

    </div>
    <div class="col-lg-2">
        <?php //include view("docu", "nav");  ?>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Credit notes</div>
            <div class="panel-body">
                <p>...</p>
            </div>

            <!-- List group -->
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>

        <?php // include view("docu", "table_index");  ?>

    </div>
    <div class="col-lg-2">
        <?php //include view("docu", "nav");  ?>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Panel heading</div>
            <div class="panel-body">
                <p>...</p>
            </div>

            <!-- List group -->
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>

        <?php // include view("docu", "table_index");  ?>

    </div>
    <div class="col-lg-2">
        <?php //include view("docu", "nav");  ?>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Panel heading</div>
            <div class="panel-body">
                <p>...</p>
            </div>

            <!-- List group -->
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>

        <?php // include view("docu", "table_index");  ?>

    </div>
    <div class="col-lg-2">
        <?php //include view("docu", "nav");  ?>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Panel heading</div>
            <div class="panel-body">
                <p>...</p>
            </div>

            <!-- List group -->
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>

        <?php // include view("docu", "table_index");  ?>

    </div>
    <div class="col-lg-2">
        <?php //include view("docu", "nav");  ?>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Panel heading</div>
            <div class="panel-body">
                <p>...</p>
            </div>

            <!-- List group -->
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>

        <?php // include view("docu", "table_index");  ?>

    </div>
    <div class="col-lg-2">
        <?php //include view("docu", "nav");  ?>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Panel heading</div>
            <div class="panel-body">
                <p>...</p>
            </div>

            <!-- List group -->
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>

        <?php // include view("docu", "table_index");  ?>

    </div>
    <div class="col-lg-2">
        <?php //include view("docu", "nav");  ?>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Panel heading</div>
            <div class="panel-body">
                <p>...</p>
            </div>

            <!-- List group -->
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>

        <?php // include view("docu", "table_index");  ?>

    </div>
    <div class="col-lg-2">
        <?php //include view("docu", "nav");  ?>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Panel heading</div>
            <div class="panel-body">
                <p>...</p>
            </div>

            <!-- List group -->
            <ul class="list-group">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>

        <?php // include view("docu", "table_index");  ?>

    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("docu", "der"); ?>
    </div>


</div>

<?php include view("home", "footer"); ?> 

