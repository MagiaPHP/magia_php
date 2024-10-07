<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//$json = (isset($_POST["json"]) && $_POST['json'] != '' ) ? ($_POST["json"]) : false;

$error = array();

$json2 = '    {
    "factux": {
        "version": 1
       
    },
    "document": {
        "controller": "invoices",
        "id": 4,
        "budget_id": null,
        "credit_note_id": null,
        "title": "",
        "seller_id": null,
        "date": "2023-10-06",
        "date_expiration": "2023-11-05",
        "total": 154.69,
        "tax": 32.48,
        "advance": null,
        "comments": null,
        "r1": "2022-01-01",
        "r2": "2022-02-01",
        "r3": "2023-01-01",
        "ce": "+++000\/0020\/23155+++",
        "code": "20231006125944651fe8a0adbeb488",
        "type": null,
        "status": 10
    },
    "reciver": {
        "client_id": 60040,
        "title": null,
        "name": "55555 55555 5555555555 5 robinson coello sabchez55",
        "lastname": null,
        "vat": "BE0877093202",
        "language": "de_DE",
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
}';

//$icj = new Invoices();
//$icj->importFromJson($json);
//$icj->getImportErrors();
//


include view('import', 'invoices_check_json');

