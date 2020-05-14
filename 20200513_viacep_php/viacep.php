<?php

Function getAddress () {

    if ( isset ($_POST['cep'])){
        $cep = $_POST['cep'];

        $cep = filterCep ($cep);

        if ( isCep ($cep)) {
            $address = getAddressViaCep($cep);
            if (property_exists($address,'erro')){
                $address = addressEmpty();
                $address->cep = 'CEP não Encontrado!';
            }
        } else {
            $address = addressEmpty();
            $address->cep = 'CEP inválido!';
        }
    } else {
        $address = addressEmpty();
    }

    return $address;
}

function addressEmpty () {
    return (object) [
        'cep'           => '',
        'logradouro'    => '',
        'bairro'        => '',
        'localidade'    => '',
        'uf'            => '',
    ];
}

function filterCep (String $cep):String {
    return preg_replace('/[^0-9]/','',$cep);
}

function isCep (String $cep):bool{
    return preg_match('/^[0-9]{5}-?[0-9]{3}$/',$cep);
}

function getAddressViaCep (String $cep) {
    $url = "https://viacep.com.br/ws/{$cep}/json/";
    return json_decode(file_get_contents($url));
}