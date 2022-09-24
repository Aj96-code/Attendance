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
                $doesUserExist = $this->getUserByUserName($username);
                if($doesUserExist["num"] > 0)
                {
                    return false;
                }
                else
                {
                    $hash_password = password_hash($password. $username,PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `user`(username, password)
                        VALUES (:username,:password)";
                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(":username",$username);
                    $stmt->bindparam(":password",$hash_password);
                    $stmt->execute();
                }
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

        public function getUserByUserName($username)
        {
           try
            {
                $sql = "SELECT COUNT(*) AS num FROM user WHERE username = :username";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":username",$username);

                $stmt->execute();
                return $stmt->fetch();
                
            } catch (PDOException $exc) 
            {
                echo $exc->getMessage();
                return false;
            } 
        }
   } 
?>