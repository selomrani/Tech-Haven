<?php
namespace App\Models;

use App\Core\Database;
use DateTime;
use PDO;

class Order{
    private int $id;
    private string $date;
    private float $total;
    private string $status;
    private User $user_fk;
    private PDO $pdo;
    private Item $items;
    public function __construct()
    {
        $this->pdo = Database::connect();
    }
    public function createOrder($user_id){
    $query = "INSERT INTO orders (total, status, user_fk) 
              VALUES (:total, :status, :user_fk)";
    
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([
        ':total'   => $this->total,
        ':status'  => $this->status,
        ':user_fk' => $user_id 
    ]);
    $this->id = $this->pdo->lastInsertId();
}

    public function updateOrder($order_id) {
    $query = "UPDATE products SET 
                total = :total, 
                status = :status
            WHERE id = :id";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([
        ':total' => $this->total,
        ':status'  => $this->status,
        ':id' => $order_id
    ]);
}

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of user_fk
     */ 
    public function getUser_fk()
    {
        return $this->user_fk;
    }

    /**
     * Set the value of user_fk
     *
     * @return  self
     */ 
    public function setUser_fk($user_fk)
    {
        $this->user_fk = $user_fk;

        return $this;
    }

    /**
     * Get the value of items
     */ 
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set the value of items
     *
     * @return  self
     */ 
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }
}