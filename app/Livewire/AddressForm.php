<?php

namespace App\Livewire;

use App\Domain\Client\ZipCodeClient;
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
        $client = app(ZipCodeClient::class);

        $data = $client->findAddress($zipCode);

        if ($data === null) {
            session()->flash('error', 'CEP não encontrado.');
            return;
        }

        $this->address['state'] = $data['state'] ?? '';
        $this->address['city'] = $data['city'] ?? '';
        $this->address['neighborhood'] = $data['neighborhood'] ?? '';
        $this->address['street'] = $data['street'] ?? '';
    }
}
