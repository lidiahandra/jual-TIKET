<?php

class DB {
    public function conn()
    {
        $conn = new mysqli("localhost", "root", "", "pembelian_tiket");

        if ($conn->error) {
            die($conn->connect_error);
        }else{
            return $conn;
        }
    }
}