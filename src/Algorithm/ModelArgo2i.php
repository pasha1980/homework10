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
        $options = [];

        if ($this->getMemoryCost()) {
            $options['memory_cost'] = $this->getMemoryCost();
        }

        if ($this->getTimeCost()) {
            $options['time_cost'] = $this->getTimeCost();
        }

        if ($this->getThreads()) {
            $options['threads'] = $this->getThreads();
        }

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