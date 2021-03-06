<?php

namespace AppBundle\Entity;

/**
 * products
 */
class products
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $presentation;

    /**
     * @var string
     */
    private $price;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return products
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return products
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set presentation
     *
     * @param string $presentation
     *
     * @return products
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return string
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return products
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * @var \AppBundle\Entity\messurementUnits
     */
    private $mesurementUnit;


    /**
     * Set mesurementUnit
     *
     * @param \AppBundle\Entity\messurementUnits $mesurementUnit
     *
     * @return products
     */
    public function setMesurementUnit(\AppBundle\Entity\messurementUnits $mesurementUnit = null)
    {
        $this->mesurementUnit = $mesurementUnit;

        return $this;
    }

    /**
     * Get mesurementUnit
     *
     * @return \AppBundle\Entity\messurementUnits
     */
    public function getMesurementUnit()
    {
        return $this->mesurementUnit;
    }
}
