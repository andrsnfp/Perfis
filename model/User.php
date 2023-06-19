<?php

class User{
    private $id;
    private $name;
    private $email;
    private $title;
    private $description;
    private $password;
    private $link_twtr;
    private $link_lnkdn;
    private $link_fbook;
    private $link_github;
    private $image_path;

    public function __construct($id, $name, $email, $password, $title, $description,  $link_twtr, $link_lnkdn, $link_fbook, $link_github, $image_path) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->title = $title;
        $this->description = $description;
        $this->password = $password;
        $this->link_twtr = $link_twtr;
        $this->link_lnkdn = $link_lnkdn;
        $this->link_fbook = $link_fbook;
        $this->link_github = $link_github;
        $this->image_path = $image_path;
    }

    function getId(){
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getLink_twtr() {
        return $this->link_twtr;
    }

    public function getLink_lnkdn() {
        return $this->link_lnkdn;
    }

    public function getLink_fbook() {
        return $this->link_fbook;
    }

    public function getLink_github() {
        return $this->link_github;
    }
    
    public function getImage_path() {
        return $this->image_path;
    }

    public function setName($name): void {
        $this->name = $name;
    }
    
    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setTitle($title): void {
        $this->title = $title;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public function setLink_twtr($link_twtr): void {
        $this->link_twtr = $link_twtr;
    }

    public function setLink_lnkdn($link_lnkdn): void {
        $this->link_lnkdn = $link_lnkdn;
    }

    public function setLink_fbook($link_fbook): void {
        $this->link_fbook = $link_fbook;
    }

    public function setLink_github($link_github): void {
        $this->link_github = $link_github;
    }
    
    public function setImage_path($image_path): void {
        $this->image_path = $image_path;
    }


}