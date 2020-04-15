<?php
declare(strict_types=1);

namespace App\Algorithm;


interface AlgorithmInterface
{
    /**
     * @return string
     */
    public function getIdentifier(): string;

    /**
     * @return array
     */
    public function getOptions(): array;

}