<?php


namespace App;

use App\Algorithm\AlgorithmInterface;

class Password implements PasswordInterface
{
    private string $password;

    public function __construct($password)
    {
        $this->setPassword($password);
    }

    /**
     * @inheritDoc
     */
    public function hash(AlgorithmInterface $algorithm): string
    {
        $a =password_hash($this->getPassword(), $algorithm->getIdentifier(), $algorithm->getOptions());
        return $a;
    }

    /**
     * @inheritDoc
     */
    public function verify(string $hash): bool
    {
        $a = password_verify($this->getPassword(), $hash);
        return $a;
    }

    /**
     * @inheritDoc
     */
    public static function needsRehash($hash, AlgorithmInterface $algorithm): bool
    {
        $b = password_needs_rehash($hash, $algorithm->getIdentifier(), $algorithm->getOptions());
        return $b;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}