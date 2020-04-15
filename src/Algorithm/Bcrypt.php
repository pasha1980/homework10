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
        $keys = [
            ($this->getSalt() == null ? $keys[0] = null : $keys[0] = 'salt'),
            ($this->getCost() == null ? $keys[1] = null : $keys[1] = 'cost'),
        ];

        $values = [
            ($keys[0] == null ? $values[0] = null : $values[0] = $this->getSalt()),
            ($keys[1] == null ? $values[1] = null : $values[1] = $this->getCost()),
        ];
        $options = array_combine( $keys ,$values );
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