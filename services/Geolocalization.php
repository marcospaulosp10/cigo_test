<?php
namespace app\services;

class Geolocalization 
{
    public function searchInGeo($street, $city, $state, $zip){
        $curl = curl_init();
        // Seta algumas opções
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.geocod.io/v1.4/geocode',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => [
                'api_key' => '78618575855ed5c41e69e6c5ded7969ce717e57',
                'street' => $street,
                'city' => $city,
                'state' => $state,
                'zip' => $zip
            ]
        ]);
        // Envia a requisição e salva a resposta
        $response = curl_exec($curl);
        return ($response);
        // Fecha a requisição e limpa a memória
        curl_close($curl);
    }
}
?>