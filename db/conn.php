<?php
    /*//dev connection
    $host = "127.0.0.1";
    $db = "attendance";
    $user = "root";
    $password = "";
    $charset = "utf8mb4";
    //* data source name
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    
    */
    //remote connection
    $host ="sql.freedb.tech";
    $db = "freedb_aj96codedb";
    $user = "freedb_freedb_aj96codedb";
    $password = "FA5FNpf&geJXV$2";
    $charset = "utf8mb4";
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    try
    {
        $pdo = new PDO($dsn,$user,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $exc)
    {
        throw new PDOException($exc->getMessage());
       //throw new PDOException($exc->getMessage()); 
    };

    require_once("crud.php");
    require_once("user.php");

    $crud = new CRUD($pdo);
    $user = new User($pdo);
    
  //$user->insertUser("admin","password");

?>
