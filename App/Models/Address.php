<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class Address{
    private int $id;
    private string $country;
    private string $city;
    private string $street;
    private int $zipcode;
    private Order $order;
    private PDO $pdo;
    public function __construct()
    {
        $this->pdo = Database::connect();
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    public function getCountry()
    {
        return $this->country;
    }
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }
    public function getStreet()
    {
        return $this->street;
    }
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }
    public function getZipcode()
    {
        return $this->zipcode;
    }
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }
    public function getOrder()
    {
        return $this->order;
    }
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }
}