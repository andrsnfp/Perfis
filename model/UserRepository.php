<?php

include_once('User.php');
include_once('DbConnection.php');

class UserRepository {
    
    private $db;

    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectAll() {
        $users = Array();
        $stmt = $this->db->prepare("SELECT * FROM `users`");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $user) {
            $users[] = new User($user[`id`], $user[`name`], $user[`email`], $user[`password`], $user[`title`], $user[`description`], $user[`link_twitter`],$user['link_linkedin'], $user[`link_facebook`], $user[`link_github`], $user[`image_path`]);
        }
        return $users;
    }

    public function selectById($id) {

        $stmt = $this->db->prepare("SELECT * FROM `users` WHERE `id` = :id");
        $stmt->execute([`id` => $id]);
        $user = $stmt->fetch();
        return new User($user[`id`], $user[`name`], $user[`email`], $user[`password`], $user[`title`], $user[`description`], $user[`link_twitter`], $user[`link_facebook`],$user['link_linkedin'], $user[`link_github`], $user[`image_path`]);
    }

    public function selectByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM `users` WHERE `email` = :email");
        $stmt->execute([`email` => $email]);
        $user = $stmt->fetch();
        return new User($user[`id`], $user[`name`], $user[`email`], $user[`password`], $user[`title`], $user[`description`], $user[`link_twitter`], $user[`link_facebook`],$user['link_linkedin'], $user[`link_github`], $user[`image_path`]);
    }

    public function authentication($email, $password) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM `users` WHERE `email` = :email AND `password` = :password");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function insert($name, $email, $title, $description, $password, $link_twtr, $link_lnkdn, $link_fbook, $link_gitHub, $image_path) {

        try {
            $stmt = $this->db->prepare("INSERT INTO `users` (`name`, `email`, `password`, `title`, `description`, `link_twitter`, `link_facebook`, `link_linkedin`, `link_github`, `image_path`) "
                    . "VALUES(:name, :email, :password, :title, :description, :link_twtr, :link_fbook, :link_lnkdn, :link_github, :image_path)");
            $stmt->bindparam(":name", $name);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":password", $password);
            $stmt->bindparam(":title", $title);
            $stmt->bindparam(":description", $description);
            $stmt->bindparam(":link_twtr", $link_twtr);
            $stmt->bindparam(":link_fbook", $link_fbook);
            $stmt->bindparam(":link_lnkdn", $link_lnkdn);
            $stmt->bindparam(":link_github", $link_gitHub);
            $stmt->bindparam(":image_path", $image_path);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function authenticate($email,$password){
        $query = "SELECT * FROM `users` WHERE `email` = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindparam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return null;
        }
    }

    public function editUser($id, $name, $email, $title, $description, $password, $link_twtr, $link_lnkdn, $link_fbook, $link_github, $image_path){
        try{
            $stmt = $this->db->prepare("UPDATE `users` SET `name` = $name, `email`=$email, `password` = $password, `title`= $title, `description`= $description, `link_twitter`=$link_twtr, `link_facebook`= $link_fbook, `link_linkedin` = $link_lnkdn, `link_github`=$link_github, `image_path`=$image_path WHERE `users`.`id`= $id");
        } catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function delete($id) {

        try {
            $stmt = $this->db->prepare("DELETE FROM `users` WHERE `users`.`id` =:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
