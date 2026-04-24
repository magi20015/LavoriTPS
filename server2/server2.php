<?php
//server 


function conversione($lunghezza, $scala){

    $fileXML="conversione.xml";
    $xml = simplexml_load_file($fileXML); //caricamento del file xml dal percorso specificato sopra
    
    //trova corrispondenza in xml e fa il calcolo
   foreach($xml->conversione as $a){ //itera tutti i conversione
        if($scala == (string)$a['from']){
            $conversione = $lunghezza * (float)$a['factor']; //cast di $a
        }
    }
    return $conversione; 
}

$server= new SoapServer("prova.wsdl"); //creazione server con file prova.wsdl, il file definisce i metodi che il server può usare
$server->addFunction("conversione"); //aggiunta della funzione conversione al server
$server->handle(); //gestisce la richiesta

?>
