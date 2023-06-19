<?php

require_once 'UserRepository.php';

class UsersService {

    private $userRepository = NULL;

    public function __construct() {
        $this->userRepository = new UserRepository();
    }

    public function getAllUsers() {
        try {
            $res = $this->userRepository->selectAll();
            return $res;
        } catch (Exception $e) {
            
        }
    }

    public function getUser($id) {
        try {
            $res = $this->userRepository->selectById($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function getNextUser($id) {
    try {
        $nextId = $id + 1;
        $res = $this->userRepository->selectById($nextId);

        // Check if the next user exists
        while (empty($res)) {
            $nextId++;
            $res = $this->userRepository->selectById($nextId);
        }

        return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getPrevUser($id) {
        try {
            $prevId = $id - 1;
            $res = $this->userRepository->selectById($prevId);
    
            // Check if the next user exists
            while (empty($res)) {
                $prevId--;
                $res = $this->userRepository->selectById($prevId);
            }
    
            return $res;
            } catch (Exception $e) {
                throw $e;
            }
        }
    

    public function createNewUser($name, $email, $password, $title, $description, $link_twtr, $link_lnkdn, $link_fbook, $link_github, $image_path) {
        try {

            $res = $this->userRepository->insert($name, $email, $title, $description, $password, $link_twtr, $link_lnkdn, $link_fbook, $link_github, $image_path);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function editThisUser($id, $name, $email, $title, $description, $password, $link_twtr, $link_lnkdn, $link_fbook, $link_github, $image_path){
        try{
            $res = $this->userRepository->editUser($id, $name, $email, $title, $description, $password, $link_twtr, $link_lnkdn, $link_fbook, $link_github, $image_path);
        }catch(Exception $e){
            throw $e;
        }
    }

    public function deleteUser($id) {
        try {
            $res = $this->userRepository->delete($id);
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }
}

