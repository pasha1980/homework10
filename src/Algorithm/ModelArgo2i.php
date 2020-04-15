<?php


namespace App\Algorithm;


abstract class ModelArgo2i implements AlgorithmInterface
{
    abstract public function getIdentifier(): string;

    protected ?int $memory_cost;
    protected ?int $time_cost;
    protected ?int $threads;

    public function __construct(?int $memory_cost=null, ?int $time_cost=null, ?int $threads=null)
    {
        $this->memory_cost = $memory_cost;
        $this->time_cost = $time_cost;
        $this->threads = $threads;
    }

    /**
     * @inheritDoc
     */
    public function getOptions(): array
    {
        $keys = [
            ($this->getMemoryCost() == null ? $keys[0] = null : $keys[0] = 'memory_cost'),
            ($this->getTimeCost() == null ? $keys[1] = null : $keys[1] = 'time_cost'),
            ($this->getThreads() == null ? $keys[2] = null : $keys[2] = 'threads'),
        ];

        $values = [
            ($keys[0] == null ? $values[0] = null : $values[0] = $this->getMemoryCost()),
            ($keys[1] == null ? $values[1] = null : $values[1] = $this->getTimeCost()),
            ($keys[2] == null ? $values[2] = null : $values[2] = $this->getThreads()),
        ];
        $options = array_combine( $keys ,$values );
        return $options;
    }

    /**
     * @return int|null
     */
    public function getThreads(): ?int
    {
        return $this->threads;
    }

    /**
     * @return int|null
     */
    public function getTimeCost(): ?int
    {
        return $this->time_cost;
    }

    /**
     * @return int|null
     */
    public function getMemoryCost(): ?int
    {
        return $this->memory_cost;
    }
}