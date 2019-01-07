<?php

class Model {
    public function conn()
    {
        $conn = new mysqli("localhost", "root", "", "pembelian_tiket");

        if ($conn->error) {
            die($conn->connect_error);
        }else{
            return $conn;
        }
    }

    public function dashboard()
    {
      $conn = $this->conn();
      $queryUsersCount = "SELECT * FROM users";
      $execUserCount = $conn->query($queryUsersCount);
      $queryOrdersCount = "SELECT * FROM orders";
      $execOrdersCount = $conn->query($queryOrdersCount);
      $queryProductsCount = "SELECT * FROM products";
      $execProductsCount = $conn->query($queryProductsCount);
      return array(
          'users' => $execUserCount->num_rows,
          'products' => $execProductsCount->num_rows,
          'orders' => $execOrdersCount->num_rows
        );
    }

    public function getAllUsers()
    {
        $conn = $this->conn();
        $query = "SELECT users.id as `id`, users.name as `name`, users.email as `email`, users.no_hp as `hp` FROM users";
        $exec = $conn->query($query);
        return $exec;
    }

    public function getAllOrders()
    {
        $conn = $this->conn();
        $query = "SELECT users.id as `userId`, users.name as `userName`, users.email as `userEmail`, users.no_hp as `userHp`, products.id as `productId`, products.title as `productTitle`, products.date as `productDate`, products.time as `productTime`, products.rating as `productRating`, products.year as `productYear`, categories.name as `categoryName`, categories.id as `categoryId`, orders.id as `orderId`, orders.chair as `orderChair` from orders INNER JOIN products ON orders.id_product=products.id INNER JOIN USERS ON orders.id_user=users.id INNER JOIN categories ON products.id_category=categories.id
                  ";
        $exec = $conn->query($query);
        return $exec;
    }

    public function getUserOrders($id)
    {
        $conn = $this->conn();
        $query = "SELECT users.id as `userId`, users.name as `userName`, users.email as `userEmail`, users.no_hp as `userHp`, products.id as `productId`, products.title as `productTitle`, products.date as `productDate`, products.time as `productTime`, products.rating as `productRating`, products.year as `productYear`, categories.name as `categoryName`, categories.id as `categoryId`, orders.id as `orderId`, orders.chair as `orderChair`, orders.amount as `orderAmount` from orders INNER JOIN products ON orders.id_product=products.id INNER JOIN USERS ON orders.id_user=users.id INNER JOIN categories ON products.id_category=categories.id WHERE orders.id_user = $id
                  ";
        $exec = $conn->query($query);
        return $exec;
    }

    public function getAllProducts($cat)
    {
        $conn = $this->conn();
        $query = "SELECT products.id as `id`, products.image as `image`, products.price as `price`, products.title as `title`, products.year as `year`, products.rating as `rating`, products.date as `date`, products.time as `time`, categories.name as `category` FROM products INNER JOIN categories ON products.id_category = categories.id ";
        if ($cat != '') {
          $query .= " WHERE products.id_category = $cat ";
        }
        $exec = $conn->query($query);
        return $exec;
    }

    public function getProductById($id)
    {
        $conn = $this->conn();
        $query = "SELECT products.id as `id`, products.image as `image`, products.price as `price`, products.title as `title`, products.year as `year`, products.rating as `rating`, products.date as `date`, products.time as `time`, categories.name as `category`, categories.id as `categoryId` FROM products INNER JOIN categories ON products.id_category = categories.id WHERE products.id = '$id' ";
        $exec = $conn->query($query);
        return $exec;
    }

    public function addProduct($title, $year, $rating, $category, $date, $time)
    {
        $conn = $this->conn();
        $query = "INSERT INTO products(id_category, title, year, rating, date, time) VALUES('$category', '$title', '$year', $rating, '$date', '$time') ";
        $exec = $conn->query($query);
        if ($exec == true) {
            return true;
        }else{
            return false;
        }
    }

    public function editProduct($title, $year, $rating, $category, $date, $time, $id)
    {
        $conn = $this->conn();
        $query = "UPDATE products SET title='$title', year='$year', rating=$rating, id_category='$category', date='$date', time='$time' WHERE id='$id' ";
        $exec = $conn->query($query);
        if ($exec == true) {
            return true;
        }else{
            return false;
        }
    }

    public function deleteProduct($id)
    {
        $conn = $this->conn();
        $query = "DELETE FROM products WHERE id='$id' ";
        $exec = $conn->query($query);
        if ($exec == true) {
            return true;
        }else{
            return false;
        }
    }

    public function getAllCategory()
    {
        $conn = $this->conn();
        $query = "SELECT * FROM categories";
        $exec = $conn->query($query);
        return $exec;
    }

    public function getUser()
    {
        $email = $_SESSION["email"];
        $conn = $this->conn();
        $query = "SELECT * FROM users WHERE email='$email' ";
        $exec = $conn->query($query);
        return $exec;
    }

    public function order($user, $product, $amount, $chair)
    {
      $conn = $this->conn();
      $query = "INSERT INTO orders(id_user, id_product, chair, amount) VALUES('$user', '$product', '$chair', $amount) ";
      $exec = $conn->query($query);
      if ($exec == true) {
          return true;
      }else{
          return false;
      }
    }

    public function landing()
    {
          $conn = $this->conn();
          $query = "SELECT products.id as `id`, products.image as `image`, products.price as `price`, products.title as `title`, products.year as `year`, products.rating as `rating`, products.date as `date`, products.time as `time`, categories.name as `category` FROM products INNER JOIN categories ON products.id_category = categories.id LIMIT 6";
          $exec = $conn->query($query);
          return $exec;
    }

    public function login($email)
    {
      $email = $_SESSION["email"];
      $conn = $this->conn();
      $query = "SELECT * FROM users WHERE email='$email' ";
      $exec = $conn->query($query);
      return $exec;
    }
}
