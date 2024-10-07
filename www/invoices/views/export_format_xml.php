<p>Formtar FACTUX</p>
<?php # export format factux ?>
<div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8">
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        if ($invoices['date'] == null) {
            echo message('info', 'This invoice has no date');
        }
        ?>


        <textarea cols="100" rows="50">
<Invoice>
    <cbc:UBLVersionID>2.0</cbc:UBLVersionID>
    <cbc:CustomizationID>
        urn:oasis:names:specification:ubl:xpath:Invoice-2.0:sbs-1.0-draft
    </cbc:CustomizationID>
    
    <cbc:ProfileID>
        bpid:urn:oasis:names:draft:bpss:ubl-2-sbs-invoice-notification-draft
    </cbc:ProfileID>
    
    <cbc:ID>A00095678</cbc:ID>
    <cbc:CopyIndicator>false</cbc:CopyIndicator>
    <cbc:UUID>849FBBCE-E081-40B4-906C-94C5FF9D1AC3</cbc:UUID>
    <cbc:IssueDate>2005-06-21</cbc:IssueDate>
    <cbc:InvoiceTypeCode>SalesInvoice</cbc:InvoiceTypeCode>
    <cbc:Note>sample</cbc:Note>
    <cbc:TaxPointDate>2005-06-21</cbc:TaxPointDate>
    <cac:OrderReference>
        <cbc:ID>AEG012345</cbc:ID>
        <cbc:SalesOrderID>CON0095678</cbc:SalesOrderID>
        <cbc:UUID>6E09886B-DC6E-439F-82D1-7CCAC7F4E3B1</cbc:UUID>
        <cbc:IssueDate>2005-06-20</cbc:IssueDate>
    </cac:OrderReference>
    
    <cac:AccountingSupplierParty>
        <cbc:CustomerAssignedAccountID>CO001</cbc:CustomerAssignedAccountID>
        <cac:Party>
            <cac:PartyName>
                <cbc:Name>Consortial</cbc:Name>
            </cac:PartyName>
            
            <cac:PostalAddress>
                <cbc:StreetName>Busy Street</cbc:StreetName>
                <cbc:BuildingName>Thereabouts</cbc:BuildingName>
                <cbc:BuildingNumber>56A</cbc:BuildingNumber>
                <cbc:CityName>Farthing</cbc:CityName>
                <cbc:PostalZone>AA99 1BB</cbc:PostalZone>
                <cbc:CountrySubentity>Heremouthshire</cbc:CountrySubentity>
                <cac:AddressLine>
                    <cbc:Line>The Roundabout</cbc:Line>
                </cac:AddressLine>
                <cac:Country>
                    <cbc:IdentificationCode>GB</cbc:IdentificationCode>
                </cac:Country>
            </cac:PostalAddress>
            
            
            <cac:PartyTaxScheme>
                <cbc:RegistrationName>Farthing Purchasing Consortium</cbc:RegistrationName>
                <cbc:CompanyID>175 269 2355</cbc:CompanyID>
                <cbc:ExemptionReason>N/A</cbc:ExemptionReason>
                <cac:TaxScheme>
                    <cbc:ID>VAT</cbc:ID>
                    <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:PartyTaxScheme>
            <cac:Contact>
                <cbc:Name>Mrs Bouquet</cbc:Name>
                <cbc:Telephone>0158 1233714</cbc:Telephone>
                <cbc:Telefax>0158 1233856</cbc:Telefax>
                <cbc:ElectronicMail>bouquet@fpconsortial.co.uk</cbc:ElectronicMail>
            </cac:Contact>
        </cac:Party>
    </cac:AccountingSupplierParty>
    
    <cac:AccountingCustomerParty>
        <cbc:CustomerAssignedAccountID>XFB01</cbc:CustomerAssignedAccountID>
        <cbc:SupplierAssignedAccountID>GT00978567</cbc:SupplierAssignedAccountID>
        <cac:Party>
            <cac:PartyName>
                <cbc:Name>IYT Corporation</cbc:Name>
            </cac:PartyName>
            <cac:PostalAddress>
                <cbc:StreetName>Avon Way</cbc:StreetName>
                <cbc:BuildingName>Thereabouts</cbc:BuildingName>
                <cbc:BuildingNumber>56A</cbc:BuildingNumber>
                <cbc:CityName>Bridgtow</cbc:CityName>
                <cbc:PostalZone>ZZ99 1ZZ</cbc:PostalZone>
                <cbc:CountrySubentity>Avon</cbc:CountrySubentity>
                <cac:AddressLine>
                    <cbc:Line>3rd Floor, Room 5</cbc:Line>
                </cac:AddressLine>
                <cac:Country>
                    <cbc:IdentificationCode>GB</cbc:IdentificationCode>
                </cac:Country>
            </cac:PostalAddress>
            <cac:PartyTaxScheme>
                <cbc:RegistrationName>Bridgtow District Council</cbc:RegistrationName>
                <cbc:CompanyID>12356478</cbc:CompanyID>
                <cbc:ExemptionReason>Local Authority</cbc:ExemptionReason>
                <cac:TaxScheme>
                    <cbc:ID>UK VAT</cbc:ID>
                    <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:PartyTaxScheme>
            <cac:Contact>
                <cbc:Name>Mr Fred Churchill</cbc:Name>
                <cbc:Telephone>0127 2653214</cbc:Telephone>
                <cbc:Telefax>0127 2653215</cbc:Telefax>
                <cbc:ElectronicMail>fred@iytcorporation.gov.uk</cbc:ElectronicMail>
            </cac:Contact>
        </cac:Party>
    </cac:AccountingCustomerParty>
    <cac:Delivery>
        <cbc:ActualDeliveryDate>2005-06-20</cbc:ActualDeliveryDate>
        <cbc:ActualDeliveryTime>11:30:00.0Z</cbc:ActualDeliveryTime>
        <cac:DeliveryAddress>
            <cbc:StreetName>Avon Way</cbc:StreetName>
            <cbc:BuildingName>Thereabouts</cbc:BuildingName>
            <cbc:BuildingNumber>56A</cbc:BuildingNumber>
            <cbc:CityName>Bridgtow</cbc:CityName>
            <cbc:PostalZone>ZZ99 1ZZ</cbc:PostalZone>
            <cbc:CountrySubentity>Avon</cbc:CountrySubentity>
            <cac:AddressLine>
                <cbc:Line>3rd Floor, Room 5</cbc:Line>
            </cac:AddressLine>
            <cac:Country>
                <cbc:IdentificationCode>GB</cbc:IdentificationCode>
            </cac:Country>
        </cac:DeliveryAddress>
    </cac:Delivery>
    <cac:PaymentMeans>
        <cbc:PaymentMeansCode>20</cbc:PaymentMeansCode>
        <cbc:PaymentDueDate>2005-07-21</cbc:PaymentDueDate>
        <cac:PayeeFinancialAccount>
            <cbc:ID>12345678</cbc:ID>
            <cbc:Name>Farthing Purchasing Consortium</cbc:Name>
            <cbc:AccountTypeCode>Current</cbc:AccountTypeCode>
            <cbc:CurrencyCode>GBP</cbc:CurrencyCode>
            <cac:FinancialInstitutionBranch>
                <cbc:ID>10-26-58</cbc:ID>
                <cbc:Name>Open Bank Ltd, Bridgstow Branch </cbc:Name>
                <cac:FinancialInstitution>
                    <cbc:ID>10-26-58</cbc:ID>
                    <cbc:Name>Open Bank Ltd</cbc:Name>
                    <cac:Address>
                        <cbc:StreetName>City Road</cbc:StreetName>
                        <cbc:BuildingName>Banking House</cbc:BuildingName>
                        <cbc:BuildingNumber>12</cbc:BuildingNumber>
                        <cbc:CityName>London</cbc:CityName>
                        <cbc:PostalZone>AQ1 6TH</cbc:PostalZone>
                        <cbc:CountrySubentity>London </cbc:CountrySubentity>
                        <cac:AddressLine>
                            <cbc:Line>5th Floor</cbc:Line>
                        </cac:AddressLine>
                        <cac:Country>
                            <cbc:IdentificationCode>GB</cbc:IdentificationCode>
                        </cac:Country>
                    </cac:Address>
                </cac:FinancialInstitution>
                <cac:Address>
                    <cbc:StreetName>Busy Street</cbc:StreetName>
                    <cbc:BuildingName>The Mall</cbc:BuildingName>
                    <cbc:BuildingNumber>152</cbc:BuildingNumber>
                    <cbc:CityName>Farthing</cbc:CityName>
                    <cbc:PostalZone>AA99 1BB</cbc:PostalZone>
                    <cbc:CountrySubentity>Heremouthshire</cbc:CountrySubentity>
                    <cac:AddressLine>
                        <cbc:Line>West Wing</cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>GB</cbc:IdentificationCode>
                    </cac:Country>
                </cac:Address>
            </cac:FinancialInstitutionBranch>
            <cac:Country>
                <cbc:IdentificationCode>GB</cbc:IdentificationCode>
            </cac:Country>
        </cac:PayeeFinancialAccount>
    </cac:PaymentMeans>
    <cac:PaymentTerms>
        <cbc:Note>
            Payable within 1 calendar month from the invoice date
        </cbc:Note>
    </cac:PaymentTerms>
    <cac:AllowanceCharge>
        <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
        <cbc:AllowanceChargeReasonCode>17</cbc:AllowanceChargeReasonCode>
        <cbc:MultiplierFactorNumeric>0.10</cbc:MultiplierFactorNumeric>
        <cbc:Amount currencyID="GBP">10.00</cbc:Amount>
    </cac:AllowanceCharge>
    <cac:TaxTotal>
        <cbc:TaxAmount currencyID="GBP">17.50</cbc:TaxAmount>
        <cbc:TaxEvidenceIndicator>true</cbc:TaxEvidenceIndicator>
        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID="GBP">100.00</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID="GBP">17.50</cbc:TaxAmount>
            <cac:TaxCategory>
                <cbc:ID>A</cbc:ID>
                <cac:TaxScheme>
                    <cbc:ID>UK VAT</cbc:ID>
                    <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
    </cac:TaxTotal>
    <cac:LegalMonetaryTotal>
        <cbc:LineExtensionAmount currencyID="GBP">100.00</cbc:LineExtensionAmount>
        <cbc:TaxExclusiveAmount currencyID="GBP">90.00</cbc:TaxExclusiveAmount>
        <cbc:AllowanceTotalAmount currencyID="GBP">10.00</cbc:AllowanceTotalAmount>
        <cbc:PayableAmount currencyID="GBP">107.50</cbc:PayableAmount>
    </cac:LegalMonetaryTotal>
    <cac:InvoiceLine>
        <cbc:ID>A</cbc:ID>
        <cbc:InvoicedQuantity unitCode="KGM">100</cbc:InvoicedQuantity>
        <cbc:LineExtensionAmount currencyID="GBP">100.00</cbc:LineExtensionAmount>
        <cac:OrderLineReference>
            <cbc:LineID>1</cbc:LineID>
            <cbc:SalesOrderLineID>A</cbc:SalesOrderLineID>
            <cbc:LineStatusCode>NoStatus</cbc:LineStatusCode>
            <cac:OrderReference>
                <cbc:ID>AEG012345</cbc:ID>
                <cbc:SalesOrderID>CON0095678</cbc:SalesOrderID>
                <cbc:UUID>6E09886B-DC6E-439F-82D1-7CCAC7F4E3B1</cbc:UUID>
                <cbc:IssueDate>2005-06-20</cbc:IssueDate>
            </cac:OrderReference>
        </cac:OrderLineReference>
        <cac:TaxTotal>
            <cbc:TaxAmount currencyID="GBP">17.50</cbc:TaxAmount>
            <cbc:TaxEvidenceIndicator>true</cbc:TaxEvidenceIndicator>
            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID="GBP">100.00</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID="GBP">17.50</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:ID>A</cbc:ID>
                    <cbc:Percent>17.5</cbc:Percent>
                    <cac:TaxScheme>
                        <cbc:ID>UK VAT</cbc:ID>
                        <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        </cac:TaxTotal>
        <cac:Item>
            <cbc:Description>Acme beeswax</cbc:Description>
            <cbc:Name>beeswax</cbc:Name>
            <cac:BuyersItemIdentification>
                <cbc:ID>6578489</cbc:ID>
            </cac:BuyersItemIdentification>
            <cac:SellersItemIdentification>
                <cbc:ID>17589683</cbc:ID>
            </cac:SellersItemIdentification>
            <cac:ItemInstance>
                <cac:LotIdentification>
                    <cbc:LotNumberID>546378239</cbc:LotNumberID>
                    <cbc:ExpiryDate>2010-01-01</cbc:ExpiryDate>
                </cac:LotIdentification>
            </cac:ItemInstance>
        </cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID="GBP">1.00</cbc:PriceAmount>
            <cbc:BaseQuantity unitCode="KGM">1</cbc:BaseQuantity>
        </cac:Price>
    </cac:InvoiceLine>
</Invoice>                
        </textarea>

    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php include "der_export_xml.php"; ?> 
    </div>
</div>
<?php
// export format factux ?>