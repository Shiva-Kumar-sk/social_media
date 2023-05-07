<?php
   class DBConnection
   {
       private $server = "localhost";
       private $name = "root";
       private $password = "";
       private $db = "myworld";

       protected $con = "";

       function __construct()
       {

           $this->con = new mysqli($this->server, $this->name, $this->password, $this->db);
           if(!$this->con){
               echo "database could not be connect";
               exit;
           }
       }
    }
