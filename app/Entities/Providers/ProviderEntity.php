<?php

namespace App\Entities\Providers;

class ProviderEntity
{
    /** @var $provider */
    protected $provider;

    /** @var $status */
    protected $status;

    /** @var $min */
    protected $min;

    /** @var $max */
    protected $max;

    /** @var $currency */
    protected $currency;

    /**
     * @param string|null $provider
     * @return $this
     */
    public function setProvider(?string $provider): ProviderEntity
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return (string)$this->provider;
    }

    /**
     * @param string|null $status
     * @return $this
     */
    public function setStatus(?string $status): ProviderEntity
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return (string)$this->status;
    }

    /**
     * @param string|null $min
     * @return $this
     */
    public function setMin(?string $min): ProviderEntity
    {
        $this->min = $min;
        return $this;
    }

    /**
     * @return int
     */
    public function getMin(): int
    {
        return (int)$this->min;
    }

    /**
     * @param string|null $max
     * @return $this
     */
    public function setMax(?string $max): ProviderEntity
    {
        $this->max = $max;
        return $this;
    }

    /**
     * @return int
     */
    public function getMax(): int
    {
        return (int)$this->max;
    }

    /**
     * @param string|null $currency
     * @return $this
     */
    public function setCurrency(?string $currency): ProviderEntity
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return (string)$this->currency;
    }
}
