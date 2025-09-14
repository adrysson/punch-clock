<?php

namespace App\Domain\Client;

interface ZipCodeClient
{
    public function findAddress(string $zipCode): ?array;
}