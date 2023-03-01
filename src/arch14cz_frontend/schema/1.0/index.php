<?php
header('Content-Type: application/xml; charset=utf-8');

$schema_uri = "https://".$_SERVER['SERVER_NAME']."/schema/1.0/";
?>
<?xml version="1.0" encoding="utf-8" ?>
<xs:schema xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:arch14cz="<?php echo $schema_uri; ?>" targetNamespace="<?php echo $schema_uri; ?>" elementFormDefault="qualified" version="1.0">

  <xs:annotation>
    <xs:documentation>XML Schema for native export of the Arch14CZ database. Related API: https://<?php echo $_SERVER['SERVER_NAME']; ?>/?page=api_doc</xs:documentation>
  </xs:annotation>

  <xs:complexType name="refType">
    <xs:simpleContent>
      <xs:extension base="xs:string">
        <xs:attribute name="ID" type="xs:string"/>
      </xs:extension>
    </xs:simpleContent>
  </xs:complexType>

  <xs:complexType name="MetadataType">
    <xs:sequence>
      <xs:element name="Variable" type="xs:string" nillable="true"/>
      <xs:element name="Value" type="xs:string" nillable="true"/>
    </xs:sequence>
  </xs:complexType>
  
  <xs:complexType name="RecordType">
    <xs:sequence>
      <xs:element name="Arch14CZ_ID" type="xs:string" nillable="true"/>
      <xs:element name="C_14_Lab_Code" type="xs:string" nillable="true"/>
      <xs:element name="C_14_Activity" type="xs:decimal" nillable="true"/>
      <xs:element name="C_14_Uncertainty" type="xs:decimal" nillable="true"/>
      <xs:element name="C_14_CE_From" type="xs:integer" nillable="true"/>
      <xs:element name="C_14_CE_To" type="xs:integer" nillable="true"/>
      <xs:element name="C_14_Note" type="xs:string" nillable="true"/>
      <xs:element name="Reliability" type="xs:string" nillable="true"/>
      <xs:element name="Reliability_Note" type="xs:string" nillable="true"/>
      <xs:element name="Country" type="arch14cz:refType" nillable="true"/>
      <xs:element name="District" type="arch14cz:refType" nillable="true"/>
      <xs:element name="Cadastre" type="arch14cz:refType" nillable="true"/>
      <xs:element name="Site" type="xs:string" nillable="true"/>
      <xs:element name="Fieldwork_Event_ID" type="xs:string" nillable="true"/>
      <xs:element name="Coordinates" type="xs:string" nillable="true"/>
      <xs:element name="Activity_Area" type="arch14cz:refType" nillable="true"/>
      <xs:element name="Feature" type="arch14cz:refType" nillable="true"/>
      <xs:element name="Context_Description" type="xs:string" nillable="true"/>
      <xs:element name="Context_Depth" type="xs:string" nillable="true"/>
      <xs:element name="Context_Name" type="xs:string" nillable="true"/>
      <xs:element name="Relative_Dating_Name" type="arch14cz:refType" nillable="true"/>
      <xs:element name="Relative_Dating_Order_From" type="xs:integer" nillable="true"/>
      <xs:element name="Relative_Dating_Order_To" type="xs:integer" nillable="true"/>
      <xs:element name="Sample_Number" type="xs:string" nillable="true"/>
      <xs:element name="Sample_Note" type="xs:string" nillable="true"/>
      <xs:element name="Material" type="arch14cz:refType" nillable="true"/>
      <xs:element name="Material_Note" type="xs:string" nillable="true"/>
      <xs:element name="Source" type="xs:string" nillable="true"/>
    </xs:sequence>
  </xs:complexType>
  
  <xs:complexType name="TermType">
    <xs:sequence>
      <xs:element name="Name" type="xs:string" minOccurs="1" maxOccurs="1"/>
      <xs:element name="ID" type="xs:string" nillable="true" minOccurs="0" maxOccurs="1"/>
      <xs:element name="Order_From" type="xs:string" nillable="true" minOccurs="0" maxOccurs="1"/>
      <xs:element name="Order_To" type="xs:string" nillable="true" minOccurs="0" maxOccurs="1"/>
    </xs:sequence>
  </xs:complexType>

  <xs:complexType name="TableType">
    <xs:choice>
      <xs:element name="metadata_row" type="arch14cz:MetadataType" minOccurs="0" maxOccurs="unbounded"/>
      <xs:element name="record_row" type="arch14cz:RecordType" minOccurs="0" maxOccurs="unbounded"/>
      <xs:element name="term_row" type="arch14cz:TermType" minOccurs="0" maxOccurs="unbounded"/>
    </xs:choice>
  </xs:complexType>
  
  <xs:element name="table" type="arch14cz:TableType"/>

</xs:schema>