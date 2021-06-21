<?php

class product
{

    private string $SKU;
    private string $name;
    private string $description;
    private float $price;
    private string $currency;
    private int $discount;

    public function __construct(stdClass $object)
    {
        $this->setSKU($object->SKU);
        $this->setName($object->name);
        $this->setDescription($object->description);
        $this->setPrice($object->price);
        $this->setCurrency($object->currency);
        $this->setDiscount($object->discount);
    }

    /**
     * @return float
     */
    public function getDiscountPrice(): float
    {
        return round((1-($this->discount/100)) * $this->price, 2);
    }

    /**
     * @return string
     */
    public function getSKU(): string
    {
        return $this->SKU;
    }

    /**
     * @param string $SKU
     */
    public function setSKU(string $SKU): void
    {
        $this->SKU = $SKU;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function getDiscount(): int
    {
        return $this->discount;
    }

    /**
     * @param int $discount
     */
    public function setDiscount(int $discount): void
    {
        $this->discount = $discount;
    }

}