<?php

use App\Core\Database;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

require 'vendor/autoload.php';
// $user = new User();
// $user->setFirstname("Soufyan");
// $user->setLastname("taj");
// $user->setEmail("e@x1.com");
// $user->setPhone("028383332");
// $user->setPassword("23456789");
// $user->setRole("admin");
// $user->createUser();
// $hh = $user->fetchByEmail("e@x.com");
// echo"<pre>";
// var_dump($hh);
// echo"</pre>";


$pc = new Product();
$pc->setName("Asus rog stri g16");
$pc->setDescription("i7 13700HX AND RTX 4070");
$pc->setPrice(2099.98);
$pc->setInStock(1);
$pc->setImage("https://upload.wikimedia.org/wikipedia/commons/a/ac/Default_pfp.jpg");
$pc->addProduct();
// $user = new Product();
// $all = $user->fetchAllproducts();
// $cat = new Category();
// $cat->setName("Laptop");
// $cat->setDescription("aazertyu");
// $cat->createCategory();
echo"<pre>";
var_dump(value: $pc);
echo"</pre>";
echo "suuuuuu";

$pc->setName("Alienware");
$pc->setImage("default");
$pc->updateProduct($pc->getId());

echo"<pre>";
var_dump(value: $pc);
echo"</pre>";
echo "suuuuuu";