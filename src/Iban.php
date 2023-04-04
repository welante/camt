<?php

declare(strict_types=1);

namespace Genkgo\Camt;

/**
 * Class Iban
 * @package Genkgo\Camt
 */
class Iban
{
    private string $iban;

    public function __construct(string $iban)
    {
        if (!\verify_iban($iban)) {
            throw new \InvalidArgumentException("Unknown IBAN {$iban}");
        }
        
        $this->iban = \iban_to_machine_format($iban);
    }

    public function getIban(): string
    {
        return $this->iban;
    }

    public function __toString(): string
    {
        return $this->iban;
    }

    public function equals(string $iban): bool
    {
        return iban_to_machine_format($iban) === $this->iban;
    }
}
