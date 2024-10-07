<textArea cols="135" rows="30">
<?xml version="1.0" encoding="UTF-8" ?>
<Invoice xmlns="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2" 
         xmlns:qdt="urn:oasis:names:specification:ubl:schema:xsd:QualifiedDatatypes-2" 
         xmlns:ccts="urn:oasis:names:specification:ubl:schema:xsd:CoreComponentParameters-2"  
         xmlns:stat="urn:oasis:names:specification:ubl:schema:xsd:DocumentStatusCode-1.0" 
         xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" 
         xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" 
         xmlns:udt="urn:un:unece:uncefact:data:draft:UnqualifiedDataTypesSchemaModule:2"> 
    <cbc:UBLVersionID>2.1</cbc:UBLVersionID> 
    <cbc:CustomizationID>urn:www.cenbii.eu:transaction:biitrns010:ver2.0:extended:urn:www.peppol.eu:bis:peppol5a:ver2.0:extended:e-fff:ver3.0</cbc:CustomizationID>
    <cbc:ProfileID>urn:www.cenbii.eu:profile:bii05:ver2.0</cbc:ProfileID>
    <cbc:ID>018</cbc:ID>
    <cbc:IssueDate>2020-08-14</cbc:IssueDate>
    <cbc:InvoiceTypeCode listID="UNCL1001">380</cbc:InvoiceTypeCode>
    <cbc:DocumentCurrencyCode listID="ISO4217">EUR</cbc:DocumentCurrencyCode>


    <cac:AdditionalDocumentReference>
        <cbc:ID>018</cbc:ID>
        <cbc:DocumentType>CommercialInvoice</cbc:DocumentType>
        <cac:Attachment>
            <cbc:EmbeddedDocumentBinaryObject mimeCode="application/pdf" filename="018-202014082020101816.pdf">
            </cbc:EmbeddedDocumentBinaryObject>
        </cac:Attachment>
    </cac:AdditionalDocumentReference>



    <cac:AdditionalDocumentReference>
        <cbc:ID>eFFF</cbc:ID>
        <cbc:DocumentType>Admin-IS 09.01.00.21</cbc:DocumentType>
    </cac:AdditionalDocumentReference>
    <cac:AccountingSupplierParty>
        <cbc:CustomerAssignedAccountID>

        </cbc:CustomerAssignedAccountID>
        <cac:Party>
            <cbc:EndpointID schemeID="BE:CBE">0896435495</cbc:EndpointID>
            <cac:PartyName>
                <cbc:Name>Lexaccount Srl</cbc:Name>
            </cac:PartyName>
            <cac:PostalAddress>
                <cbc:StreetName>rue Charles Martel 8</cbc:StreetName>
                <cbc:AdditionalStreetName></cbc:AdditionalStreetName>
                <cbc:CityName>BRUXELLES-VILLE</cbc:CityName>
                <cbc:PostalZone>1000</cbc:PostalZone>
                <cac:Country>
                    <cbc:IdentificationCode listID="ISO3166-1:Alpha2">BE</cbc:IdentificationCode>
                </cac:Country>
            </cac:PostalAddress>
            <cac:PartyTaxScheme>
                <cbc:CompanyID schemeID="BE:VAT">BE0896435495</cbc:CompanyID>
                <cac:TaxScheme>
                    <cbc:ID>VAT</cbc:ID>
                </cac:TaxScheme>
            </cac:PartyTaxScheme>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName>Lexaccount Srl</cbc:RegistrationName>
                <cbc:CompanyID schemeID="BE:VAT">BE0896435495</cbc:CompanyID>
            </cac:PartyLegalEntity>
            <cac:Contact>
                <cbc:Telephone>+32 (477) 985418</cbc:Telephone>
            </cac:Contact>
        </cac:Party>
    </cac:AccountingSupplierParty>
    <cac:AccountingCustomerParty>
        <cac:Party>
            <cbc:EndpointID schemeID="BE:VAT">BE0508539920</cbc:EndpointID>
            <cac:PartyName>
                <cbc:Name>SRL Audioprothese</cbc:Name>
            </cac:PartyName>
            <cac:PostalAddress>
                <cbc:StreetName>Rue De Grand-bigard 481 </cbc:StreetName>
                <cbc:AdditionalStreetName></cbc:AdditionalStreetName>
                <cbc:CityName>BERCHEM-SAINTE-AGATHE</cbc:CityName>
                <cbc:PostalZone>1082</cbc:PostalZone>
                <cac:Country>
                    <cbc:IdentificationCode listID="ISO3166-1:Alpha2">BE</cbc:IdentificationCode>
                </cac:Country>
            </cac:PostalAddress>
            <cac:PartyTaxScheme>
                <cbc:CompanyID schemeID="BE:VAT">BE0508539920</cbc:CompanyID>
                <cac:TaxScheme>
                    <cbc:ID>VAT</cbc:ID>
                </cac:TaxScheme>
            </cac:PartyTaxScheme>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName>SRL Audioprothese</cbc:RegistrationName>
                <cbc:CompanyID schemeID="BE:VAT">BE0508539920</cbc:CompanyID>
            </cac:PartyLegalEntity>
            <cac:Contact>
                <cbc:Name></cbc:Name>
                <cbc:Telephone></cbc:Telephone>
                <cbc:ElectronicMail></cbc:ElectronicMail>
            </cac:Contact>
        </cac:Party>
    </cac:AccountingCustomerParty>
    <cac:PaymentMeans>
        <cbc:PaymentMeansCode listID="UNCL4461">1</cbc:PaymentMeansCode>
        <cbc:PaymentDueDate>2020-08-22</cbc:PaymentDueDate>
        <cbc:PaymentID>000000001818</cbc:PaymentID>
        <cac:PayeeFinancialAccount>
            <cbc:ID schemeID="IBAN">BE80001548738877</cbc:ID>
            <cac:FinancialInstitutionBranch>
                <cac:FinancialInstitution>
                    <cbc:ID schemeID="BIC">GEBABEBB</cbc:ID>
                </cac:FinancialInstitution>
            </cac:FinancialInstitutionBranch>
        </cac:PayeeFinancialAccount>
    </cac:PaymentMeans>
    <cac:PaymentTerms>
        <cbc:Note>000000001818</cbc:Note>
    </cac:PaymentTerms>
    <cac:TaxTotal>
        <cbc:TaxAmount currencyID="EUR">174.83</cbc:TaxAmount>
        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID="EUR">832.50</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID="EUR">174.83</cbc:TaxAmount>
            <cac:TaxCategory>
                <cbc:ID schemeID="UNCL5305">S</cbc:ID>
                <cbc:Name>03</cbc:Name>
                <cbc:Percent>21.00</cbc:Percent>
                <cac:TaxScheme>
                    <cbc:ID>VAT</cbc:ID>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
    </cac:TaxTotal>
    <cac:LegalMonetaryTotal>
        <cbc:LineExtensionAmount currencyID="EUR">832.50</cbc:LineExtensionAmount>
        <cbc:TaxExclusiveAmount currencyID="EUR">832.50</cbc:TaxExclusiveAmount>
        <cbc:TaxInclusiveAmount currencyID="EUR">1007.33</cbc:TaxInclusiveAmount>
        <cbc:PayableAmount currencyID="EUR">1007.33</cbc:PayableAmount>
    </cac:LegalMonetaryTotal>
    <cac:InvoiceLine>
        <cbc:ID>1</cbc:ID>
        <cbc:InvoicedQuantity unitCode="ZZ" unitCodeListID="UNECERec20">1.00</cbc:InvoicedQuantity>
        <cbc:LineExtensionAmount currencyID="EUR">832.50</cbc:LineExtensionAmount>
        <cac:Item>
            <cbc:Description>Prestations comptables et fiscales arrêtées au 30 juin 2020</cbc:Description>
            <cbc:Name>Prestations comptables et fiscales arrêtées au 30 juin 2020</cbc:Name>
            <cac:SellersItemIdentification>
                <cbc:ID>1-700000</cbc:ID>
            </cac:SellersItemIdentification>
            <cac:ClassifiedTaxCategory>
                <cbc:ID schemeID="UNCL5305">S</cbc:ID>
                <cbc:Name>03</cbc:Name>
                <cbc:Percent>21.00</cbc:Percent>
                <cac:TaxScheme>
                    <cbc:ID>VAT</cbc:ID>
                </cac:TaxScheme>
            </cac:ClassifiedTaxCategory>
        </cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID="EUR">832.50</cbc:PriceAmount>
        </cac:Price>
    </cac:InvoiceLine>
</Invoice>

</textArea>