<?php

namespace App\Domain\Repository;

interface TimeClockRepository
{
    public function all(?string $startDate = null, ?string $endDate = null): array;
}
