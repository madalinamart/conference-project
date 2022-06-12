<?php 
 class user{
    private $db;

    function __construct($conn){
        $this->db = $conn;
    }

    public function insertUser($username,$password){
        try {
            //CHECK IF THERE ARE 2 USERS WITH THE SAME USERNAME
            $result = $this->getUserByUsername($username);
            //IF THERE'S 2 USERS WITH THE SAME USERNAME DO NOTHING
            if($result['num'] > 0) {
                return false;
            } else {
            //ENCRYPT PASSWORD
            $new_password = password_hash($password, PASSWORD_BCRYPT);
            //define sql query
            $sql = "INSERT INTO users(username,password) VALUES (:username, :password)";
            //prepare statement
            $stmt = $this->db->prepare($sql);
            //bind placeholders to params
            $stmt->bindparam(':username', $username);
            $stmt->bindparam(':password', $new_password);
            //execute query
            $stmt->execute();
            return true;
            }
        } catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function getUser($username){
        try{
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;  
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }     
    }

    public function getUserByUsername($username){
        try{
            //GET NUMBER OF USERS THAT MATCH THAT USERNAME -> make sure we don't have 2 equal usernames
            $sql = "SELECT count(*) as num FROM users WHERE username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;  
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }     
    }
 }
?>