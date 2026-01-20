<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class  Category{
    private int $id;
    private string $name;
    private string $description;
    private PDO $pdo;
    private Product $products;
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
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
    public function getProducts()
    {
        return $this->products;
    }
    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }
    public function createCategory(){
        $query = "INSERT INTO categories (name, description) VALUES (:name,:description)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(
            [':name' => $this->name,
            ':description' => $this->description
        ]);
        $this->id = $this->pdo->lastInsertId();
    }
    public function filterProductsByCategory($categoryName): array{
        $query = "SELECT * FROM products WHERE category_fk = :category";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$categoryName]);
        $stmt->setFetchMode(PDO::FETCH_CLASS,Product::class);
        return $stmt->fetchAll();
    }
}