<?php

namespace Tests\Unit;

use App\Infrastructure\Client\ViaCepZipCodeClient;
use PHPUnit\Framework\TestCase;

class ViaCepZipCodeClientTest extends TestCase
{
    public function test_returns_null_for_invalid_zipcode_length()
    {
        $client = new ViaCepZipCodeClient();
        $this->assertNull($client->findAddress('12345'));
        $this->assertNull($client->findAddress(''));
    }

    public function test_returns_null_when_file_get_contents_fails()
    {
        $client = $this->getMockBuilder(ViaCepZipCodeClient::class)
            ->onlyMethods(['request'])
            ->getMock();
        $client->method('request')->willReturn(false);
        $this->assertNull($client->findAddress('01001000'));
    }

    public function test_returns_null_when_cep_not_found()
    {
        $client = $this->getMockBuilder(ViaCepZipCodeClient::class)
            ->onlyMethods(['request'])
            ->getMock();
        $client->method('request')->willReturn(json_encode(['erro' => true]));
        $this->assertNull($client->findAddress('99999999'));
    }

    public function test_returns_address_array_on_success()
    {
        $response = [
            'uf' => 'SP',
            'localidade' => 'São Paulo',
            'bairro' => 'Sé',
            'logradouro' => 'Praça da Sé',
        ];
        $client = $this->getMockBuilder(ViaCepZipCodeClient::class)
            ->onlyMethods(['request'])
            ->getMock();
        $client->method('request')->willReturn(json_encode($response));
        $expected = [
            'state' => 'SP',
            'city' => 'São Paulo',
            'neighborhood' => 'Sé',
            'street' => 'Praça da Sé',
        ];
        $this->assertEquals($expected, $client->findAddress('01001000'));
    }
}
