<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\CategoryRepository")
 */
class Category {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=255)
     */
    private $product_name;

    /**
     * @var string
     *
     * @ORM\Column(name="car_mark", type="string", nullable=true)
     */
    private $car_mark;

    /**
     *
     * @ORM\Column(name="car_model", type="string" , length=255)
     */
    private $car_model;
    
    /**
     *
     * @ORM\Column(name="car_year", type="string")
     */
    private $car_year;
    
    /**
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    function getProductName() {
        return $this->product_name;
    }

    function setProductName($product_name) {
        $this->product_name = $product_name;
    }
    
    function getCarMark() {
        return $this->car_mark;
    }

    function setCarMark($car_mark) {
        $this->car_mark = $car_mark;
    }
    
    function getCarModel() {
        return $this->car_model;
    }

    function setCarModel($car_model) {
        $this->car_model = $car_model;
    }

    function getCarYear() {
        return $this->car_year;
    }

    function setCarYear($car_year) {
        $this->car_year = $car_year;
    }


    function getDescription() {
        return $this->description;
    }

    function setDescription($description) {
        $this->description = $description;
    }




}
