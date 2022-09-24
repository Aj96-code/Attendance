<?php
   class User
   {

        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function insertUser($username,$password)
        {
            try
            {
             $sql = "INSERT INTO `user`(username, password)
                VALUES (:username,:password)";
             $stmt = $this->db->prepare($sql);
             $stmt->bindparam(":username",$username);
             $stmt->bindparam(":password",$password);
             $stmt->execute();
            } catch(PDOException $exc)
            {
                echo $exc->getMessage();
                return false;
            }
        }

        public function getUser($username, $password)
        {
            try 
            {
                $sql = "SELECT * FROM user 
                WHERE username = :username AND password = :password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":username", $username);
                $stmt->bindparam(":password", $password);
                $stmt->execute();
                return true;
            } catch (PDOException $exc) 
            {
                echo $exc->getMessage();
                return false;
            }
        }
   } 
?>