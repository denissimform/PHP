<?php

$res = simplexml_load_file("index.xml");


echo "<h2>Person {$res->attributes()->info}</h2>";

echo "<pre>";
echo "Name: " . $res->Name . "<br>";
echo "Family background:<br>";
echo "\tFather name: " . $res->FamilyBackground->FatherName . "<br>";
echo "\tMother name: " . $res->FamilyBackground->MotherName . "<br>";
echo "\tBrother name: " . $res->FamilyBackground->BrotherName . "<br>";
echo "Education:<br>";
echo "\tSSC: " . $res->Education->Name[0] . "<br>";
echo "\tHSC: " . $res->Education->Name[1] . "<br>";
echo "\tBE: " . $res->Education->Name[2] . "<br>";



$dom = new DOMDocument();
$dom->version = "1.0";
$dom->encoding = "UTF-8";

$parentnode = $dom->createElement("ParentElement");
$attribute = new DOMAttr("status", 'parent_node');
$parentnode->setAttributeNode($attribute);
$childnode = $dom->createElement("ChildElement");
$attribute = new DOMAttr("status", 'child_node');
$childnode->setAttributeNode($attribute);
$parentnode->appendChild($childnode);
$dom->append($parentnode);
$dom->save("new.xml");
