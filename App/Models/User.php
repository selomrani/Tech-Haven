<?php
namespace App\Models;

use App\Core\Database;
use DateTime;
use PDO;

class User{
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $phone;
    private string $password;
    private  $created_at;
    private string $role;
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
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }
    public function getLastname()
    {
        return $this->lastname;
    }
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    } 
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    } 
    public function getCreated_at()
    {
        return $this->created_at;
    }
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
        public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }
public function createUser(){
    $query = "INSERT INTO users (firstname,lastname,email,phone,password,role) VALUES (:firstname, :lastname, :email, :phone, :password, :role)";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([
        ':firstname' => $this->firstname,
        ':lastname' => $this->lastname,
        ':email' => $this->email,
        ':phone' => $this->phone,
        ':password' => password_hash($this->password,PASSWORD_DEFAULT),
        ':role' => $this->role
    ]);
    $this->id = $this->pdo->lastInsertId();
}
public static function fetchByEmail($email): User{
    $pdo = Database::connect();
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':email' => $email]);
    $stmt->setFetchMode(PDO::FETCH_CLASS,User::class);
    $res = $stmt->fetch();
    return  $res;
}
public function checkpassword($pass,$hash){
    if(password_verify($pass,$hash)){
        return true;
    }
    else{
        return false;
    }
}
}