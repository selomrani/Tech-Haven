<?php
namespace App\Models;
use App\Core\Database;
use App\Models\Category;
use PDO;

class Product{
    private int $id;
    private string $name;
    private string $description;
    // private Category $category = "1";
    private float $price;
    private bool $inStock;
    private ?string $image;
    private PDO $pdo;
    private string $category;
    public function __construct()
    {
        $this->pdo = Database::connect();
        // $this->category;
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
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
    public function getInStock()
    {
        return $this->inStock;
    }
    public function setInStock($inStock)
    {
        $this->inStock = $inStock;

        return $this;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
    public function addProduct(){
        $query = "INSERT INTO products (name,description,price,inStock,image) VALUES (:name,:description,:price,:inStock,:image)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':name'=> $this->name,
        ':description' => $this->description,
        ':price' => $this->price,
        ':inStock' => $this->inStock,
        ':image' => $this->image,
        // ':category_fk' => $this->category
        ]);
        $this->id = $this->pdo->lastInsertId();
    }
    public  function fetchAllproducts(): array{
        $query = "SELECT * FROM products";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS,Product::class);
        return $stmt->fetchAll();
    }
public function updateProduct($productId) {
    $sql = "UPDATE products SET 
                name = :name, 
                description = :description, 
                price = :price, 
                inStock = :inStock, 
                image = :image 
            WHERE id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        ':name'        => $this->name,
        ':description' => $this->description,
        ':price'       => $this->price,
        ':inStock'     => $this->inStock,
        ':image'       => $this->image,
        ':id'          => $productId
    ]);
}

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }
public static function find($id)
{
    $pdo = Database::connect();
    $query = "SELECT * FROM products WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
    return $stmt->fetch();
}
}