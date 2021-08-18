<?php

namespace App\Helper;

class Helper
{

    public function xmlFormatter($resourceArray)
    {
        $xml = new \DomDocument('1.0', 'UTF-8');
        //Add root node
        $root = $xml->createElement('root');
        $xml->appendChild($root);

        // Add child nodes
        foreach ($resourceArray as $key => $val) {
            foreach ($val as $field_name => $field_value) {
                $name = $root->appendChild($xml->createElement($field_name));
                $name->appendChild($xml->createTextNode($field_value));
            }
        }
        return $xml->saveXML();
    }
}
