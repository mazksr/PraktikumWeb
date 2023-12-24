<?php

define("DB_NAME", "mit");
define("DB_HOSTNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");

class Connection
{
    public $connect;

    public function __construct()
    {
        $this->connect = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);

        if($this->createDb()) {
            mysqli_select_db($this->connect, DB_NAME);

            $this->createTb();
        }

    }

    private function createDb() {
        return mysqli_query($this->connect, "CREATE DATABASE IF NOT EXISTS " . DB_NAME);
    }

    private function createTb() {
        $query = "CREATE TABLE IF NOT EXISTS mahasiswa(
            nim VARCHAR(255) NOT NULL PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            fakultas VARCHAR(255) NOT NULL,
            jurusan VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL)";

        return mysqli_query($this->connect, trim($query));
    }
}

?>