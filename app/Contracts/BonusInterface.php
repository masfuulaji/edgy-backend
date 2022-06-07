<?php

namespace App\Contracts;

interface BonusInterface
{
    public function calculateBonus(float $score): float;
}
