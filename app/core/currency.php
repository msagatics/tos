<?php

function setCurrency(string $currency): void
{
    $allowed = ['TZS', 'USD'];

    if (in_array($currency, $allowed, true)) {
        $_SESSION['currency'] = $currency;
    }
}

function getCurrency(): string
{
    return $_SESSION['currency'] ?? 'TZS';
}

function convertPrice(float $price): float
{
    if (getCurrency() === 'USD') {
        $rate = 2646.25; // temporary/example rate
        return $price / $rate;
    }

    return $price;
}
