<?php


namespace App\Algorithm;


class Bcrypt implements AlgorithmInterface
{
    private ?string $salt;
    private ?int $cost;

    public function __construct(?string $salt=null, ?int $cost=null)
    {
            $this->salt=$salt;
            $this->cost=$cost;
    }

    /**
     * @inheritDoc
     */
    public function getIdentifier(): string
    {
        return '2y';
    }

    /**
     * @inheritDoc
     */
    public function getOptions(): array
    {
        $options = [];
        if ($this->getSalt()) {
            $options['salt'] = $this->getSalt();
        }
        if ($this->getCost()) {
            $options['cost'] = $this->getCost();
        }
        return $options;
    }

    /**
     * @return string|null
     */
    public function getSalt(): ?string
    {
        return $this->salt;
    }

    /**
     * @return int|null
     */
    public function getCost(): ?int
    {
        return $this->cost;
    }

}