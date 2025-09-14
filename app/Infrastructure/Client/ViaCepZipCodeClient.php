<?php

namespace App\Infrastructure\Client;

use App\Domain\Client\ZipCodeClient;

class ViaCepZipCodeClient implements ZipCodeClient
{
    public function findAddress(string $zipCode): ?array
    {
        $zipCode = preg_replace('/\D/', '', $zipCode ?? '');

        if (strlen($zipCode) !== 8) {
            return null;
        }

        $response = $this->request($zipCode);

        if ($response === false) {
            return null;
        }

        $data = json_decode($response, true);

        if (isset($data['erro']) && $data['erro'] === true) {
            return null;
        }

        return [
            'state' => $data['uf'] ?? '',
            'city' => $data['localidade'] ?? '',
            'neighborhood' => $data['bairro'] ?? '',
            'street' => $data['logradouro'] ?? '',
        ];
    }

    protected function request(string $zipCode): string|false
    {
        return file_get_contents(env('VIA_CEP_URL') . "{$zipCode}/json/");
    }
}
