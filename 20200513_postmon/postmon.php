<?php

Function getAddress () {

    $address = new \stdClass();

    if ( isset ($_POST['cep'])){
        $cep = $_POST['cep'];

        $cep = filterCep ($cep);

        if ( isCep ($cep)) {
            $cepret = getAddressViaCep($cep);

            if (property_exists($cepret,'erro')){
                $cepret = addressEmpty();
                $cepret->cep = 'CEP não Encontrado!';
            } else {
                if (property_exists($cepret,'cidade')){
                    $address->cep          = $cep;
                    $address->logradouro   = $cepret->logradouro;
                    $address->uf           = $cepret->estado;
                    $address->bairro        = $cepret->bairro;
                    $address->localidade   = $cepret->cidade;
                    
                    //$address = json_encode($address1);
                } else {
                    $address = $cepret;
                }
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
    $url = "https://api.postmon.com.br/v1/cep/{$cep}";
    return json_decode(file_get_contents($url));
}