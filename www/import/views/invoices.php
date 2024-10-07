<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view("import", "izq"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <?php include view("import", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _menu_icon('top', "invoices") ?>  <?php _t("Invoices"); ?></h1>


        <p>
            Ingrese aqui el codigo factux para importar la factura conrrespondiente
        </p>


        <form class="form-horizontal"  target="new" action="index.php" method="get">
            <input type="hidden" name="c" value="import">
            <input type="hidden" name="a" value="ok_invoices">


            <div class="form-group">
                <label for="code" class="col-sm-2 control-label">
                    <?php _t("Factux code"); ?>
                </label>
                <div class="col-sm-10">
                    <input value="<?php echo $factux_code; ?>" type="text" class="form-control" name="code" id="code" placeholder="QkUxMjMuNDU2Ljc4OS1pbnZvaWNlcy0xNzAtNDE1NTQ4N2Y1czRzNTVxcTQ=">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">
                        <?php _t("Import"); ?>
                    </button>
                </div>
            </div>
        </form>

        <br>
        <br>
        <br>
        <br><hr>



        <form class="form-horizontal"  target="new" action="index.php" method="post">
            <input type="hidden" name="c" value="import">
            <input type="hidden" name="a" value="ok_invoices">


            <div class="form-group">
                <label for="json" class="col-sm-2 control-label">
                    <?php _t("json"); ?>
                </label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="json" id="json" rows="10">
    {
    "factux": {
        "version": 1,
        "url": "factux.be",
        "date": "2023-10-07",
        "time": "15:27:55",
        "network": {
            "doc": "invoices",
            "id": "BE123456789INV1",
            "sender": "BE123456789",
            "reciver": "BE0877093202",
            "cloud": false
        }
    },
    "document": {
        "controller": "invoices",
        "id": 1,
        "budget_id": null,
        "credit_note_id": null,
        "title": "TEST",
        "seller_id": null,
        "date": "2023-10-06",
        "date_expiration": "2023-11-05",
        "total": 154.69,
        "tax": 32.48,
        "advance": null,
        "comments": null,
        "r1": null,
        "r2": null,
        "r3": null,
        "ce": "+++000\/0020\/23155+++",
        "code": "20231006125944651fe8a0adbeb488",
        "type": "I",
        "status": 10
    },
    "reciver": {
        "client_id": 60040,
        "title": null,
        "name": "robinson coello",
        "lastname": null,
        "vat": "BE0877093202",
        "language": "es_ES",
        "addresses": {
            "Billing": {
                "address": "calle",
                "number": "1",
                "postcode": "1081",
                "neighborhood": "koekelberg",
                "sector": null,
                "ref": "Bruxelles",
                "city": "Bruxelles",
                "province": "Bruxelles",
                "region": "null",
                "country": "BE"
            },
            "Delivery": {
                "address": "calle",
                "number": "1",
                "postcode": "1081",
                "neighborhood": "koekelberg",
                "sector": null,
                "ref": "Bruxelles",
                "city": "Bruxelles",
                "province": "Bruxelles",
                "region": "null",
                "country": "BE"
            }
        }
    },
    "sender": {
        "name": "Patricia Cadavid",
        "vat": "BE123456789",
        "language": "en_GB",
        "addresses": {
            "Billing": {
                "address": "Rue de la baignoire",
                "number": "H2O",
                "postcode": "1050",
                "neighborhood": "Ixelles",
                "sector": "Sector",
                "ref": "Bruxelles",
                "city": "Bruxelles",
                "province": "Bruxelles",
                "region": "Region",
                "country": "BE"
            }
        },
        "bank": {
            "name": "Banco name",
            "account_number": "00-123456-789",
            "bic": "BIC",
            "iban": "IBAN"
        },
        "directory": {
            "Email": "info@pato.com",
            "Web": false,
            "GSM": false,
            "Tel": false,
            "Facebook": false,
            "Tel3": false,
            "Tel2": false,
            "Fax": false,
            "Email-secure": false,
            "nationalNumber": false
        }
    },
    "lines": {
        "1": {
            "code": null,
            "quantity": 31,
            "description": "Desayunos",
            "price": 1.5,
            "discounts": 0,
            "discounts_mode": "%",
            "tax": 21,
            "subtotal": 46.5,
            "totaldiscounts": 0,
            "totaltax": 9.765,
            "total": 56.265
        },
        "2": {
            "code": null,
            "quantity": 31,
            "description": "Almuerzos",
            "price": 2.5,
            "discounts": 0,
            "discounts_mode": "%",
            "tax": 21,
            "subtotal": 77.5,
            "totaldiscounts": 0,
            "totaltax": 16.275,
            "total": 93.775
        },
        "3": {
            "code": null,
            "quantity": 31,
            "description": "Cenas",
            "price": 0.99,
            "discounts": 0,
            "discounts_mode": "%",
            "tax": 21,
            "subtotal": 30.69,
            "totaldiscounts": 0,
            "totaltax": 6.4449,
            "total": 37.1349
        }
    },
    "totals": {
        "21": {
            "items": 93,
            "total": 154.69,
            "discounts": 0,
            "taxable_base": 154.69,
            "%vat": 21,
            "total_tva": 32.4849
        },
        "12": {
            "items": 0,
            "total": 0,
            "discounts": 0,
            "taxable_base": 0,
            "%vat": 12,
            "total_tva": 0
        },
        "6": {
            "items": 0,
            "total": 0,
            "discounts": 0,
            "taxable_base": 0,
            "%vat": 6,
            "total_tva": 0
        },
        "0": {
            "items": 0,
            "total": 0,
            "discounts": 0,
            "taxable_base": 0,
            "%vat": 0,
            "total_tva": 0
        }
    }
}                        
                    </textarea>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">
                        <?php _t("Import"); ?>
                    </button>
                </div>
            </div>
        </form>




        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


        <h2>Verificar si un codigo es correcto</h2>



        <form class="form-horizontal"  target="new" action="index.php" method="get">
            <input type="hidden" name="c" value="invoices">
            <input type="hidden" name="a" value="import_all_pdf">


            <div class="form-group">
                <label for="code" class="col-sm-2 control-label">
                    <?php _t("Factux code"); ?>
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="code" id="code" placeholder="QkUxMjMuNDU2Ljc4OS1pbnZvaWNlcy0xNzAtNDE1NTQ4N2Y1czRzNTVxcTQ=">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">
                        <?php _t("Import"); ?>
                    </button>
                </div>
            </div>
        </form>


        <h3><?php _t('Factux code'); ?></h3>

        <p>El codigo para importar se parece a este: </p>

        <pre>QkUxMjMuNDU2Ljc4OS1pbnZvaWNlcy0xNzAtNDE1NTQ4N2Y1czRzNTVxcTQ=</pre>

        <p>Este codigo es una codificacion de los siguientes tados: </p>

        <ul>
            <li>tva del sender</li>
            <li>Tipo de documento [invoices, credit_note]</li>
            <li>Numero de documento</li>
            <li>Codigo del documento</li>
        </ul>

        <p>Estos datos separados por '-'</p>

        <p>Ejemplo: </p>

        <ul>
            <li>BE123456789</li>
            <li>invoices</li>
            <li>101</li>
            <li>zAtNDE1NTQ4</li>
        </ul>

        <p>Daria como resultado </p>

        <pre>BE123456789-invoices-101-zAtNDE1NTQ4</pre>

        <p>A esto le aplicamos la codificacion y nos da como resultado</p>


        <pre>QkUxMjMuNDU2Ljc4OS1pbnZvaWNlcy0xNzAtNDE1NTQ4N2Y1czRzNTVxcTQ=</pre>

        $uuid = "$tva-$type-$number-$code";



    </div>
</div>

<?php include view("home", "footer"); ?> 

