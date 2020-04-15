<?php


namespace App\Algorithm;


final class Argon2i extends ModelArgo2i
{

    public function getIdentifier(): string
    {
        return 'argon2i';
    }
}