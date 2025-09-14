<?php

namespace App\Livewire;

use Livewire\Component;

class AddressForm extends Component
{
    public $address = [
        'zip_code' => '',
        'state' => '',
        'city' => '',
        'neighborhood' => '',
        'street' => '',
        'number' => '',
        'complement' => '',
    ];

    public function render()
    {
        return view('livewire.address-form');
    }

    public function searchAddress(string $zipCode): void
    {
        $zipCode = preg_replace('/\D/', '', $zipCode ?? '');

        if (strlen($zipCode) !== 8) {
            $this->addError('address.zip_code', __('CEP inválido.'));
            return;
        }

        $response = file_get_contents(env('VIA_CEP_URL') . "{$zipCode}/json/");

        if ($response === false) {
            $this->addError('address.zip_code', __('Não foi possível buscar o endereço. Tente novamente.'));
            return;
        }

        $data = json_decode($response, true);

        if (isset($data['erro']) && $data['erro'] === true) {
            $this->addError('address.zip_code', __('CEP não encontrado.'));
            return;
        }

        $this->address['state'] = $data['uf'] ?? '';
        $this->address['city'] = $data['localidade'] ?? '';
        $this->address['neighborhood'] = $data['bairro'] ?? '';
        $this->address['street'] = $data['logradouro'] ?? '';
    }
}
