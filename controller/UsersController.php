<?php

require_once '../model/UsersService.php';

class UsersController {
    private $usersService = NULL;
    private $controller = NULL;

    public function __construct() {
        $this->usersService = new UsersService();
    }

    public function redirect($location) {
        header('Location: ' . $location);
        exit();
    }

    function flash($name = '', $message = '', $class = 'form-message form-message-red'){
        if (!empty($name)) {
            if (!empty($message) && empty($_SESSION[$name])) {
                $_SESSION[$name] = $message;
                $_SESSION[$name . '_class'] = $class;
            } else if (empty($message) && !empty($_SESSION[$name])) {
                $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : $class;
                echo '<div class="' . $class . '" >' . $_SESSION[$name] . '</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name . '_class']);
            }
        }
    }

    public function requestsHandler($id) {

        $filterOp = filter_input(INPUT_GET, 'op');
        $op = isset($filterOp) ? $filterOp : NULL;

        try {
            if (!$op || $op == 'next') {
                $this->nextUser($id);
            } else if ($op == 'prev') {
                $this->prevUser($id);
            } else if ($op == 'save') {
                $this->saveUser();
            } else if ($op == 'edit') {
                $this->editUser($id);
            } else if($op == 'myProfile'){
                $this->myProfile($id);
            }else {
                $this->showError("Page not found", "Page for operation " . $op . " was not found!");
            }
        } catch (Exception $e) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function nextUser($id) {
        $users = $this->usersService->getNextUser($id);
        include 'view/users.php';
    }

    public function prevUser($id) {
        $users = $this->usersService->getNextUser($id);
        include 'view/users.php';
    }

    public function login()
    {
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST);

        //Init data
        $data = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password'])
        ];

        if (empty($data['email']) || empty($data['password'])) {
            
            $this->flash("login", "Por favor preencha todos os campos");
            header("location: ../login.php");
            exit();
        }

        //Check for user/email
        if ($this->usersService->getUserByEmail($data['email'])) {
            //User Found
            $loggedInUser = $this->controller->login($data['email'], $data['usersPwd']);
            if ($loggedInUser) {
                //Create session
                $this->createUserSession($loggedInUser);
                $this->redirect('users.php');
            } else {
                $this->flash("login", "Palavra-passe incorrecta");
                $this->redirect("login.php");
            }
        } else {
            $this->flash("login", "Nenhum utilizador encontrado");
            $this->redirect("../login.php");
        }
    }
    
    public function editUser($id) {
        
        $name = '';
        $email = '';
        $title = '';
        $description ='';
        $password = '';
        $link_twtr = '';
        $link_lnkdn='';
        $link_fbook='';
        $link_github='';
        $image_path='';

        $name = isset($_POST['name']) ? filter_input(INPUT_POST, 'name') : NULL;
            $password = isset($_POST['password']) ? filter_input(INPUT_POST, 'password') : NULL;
            $email = isset($_POST['email']) ? filter_input(INPUT_POST, 'email') : NULL;
            $title = isset($_POST['title']) ? filter_input(INPUT_POST, 'title') : NULL;
            $description = isset($_POST['description']) ? filter_input(INPUT_POST, 'description') : NULL;
            $link_twtr = isset($_POST['link_twitter']) ? filter_input(INPUT_POST, 'link_twitter') : NULL;
            $link_lnkdn = isset($_POST['link_twitter']) ? filter_input(INPUT_POST, 'link_linkedin') : NULL;
            $link_fbook = isset($_POST['link_facebook']) ? filter_input(INPUT_POST, 'link_facebook') : NULL;
            $link_github = isset($_POST['link_github']) ? filter_input(INPUT_POST, 'link_github') : NULL;
            $image_path = isset($_POST['image_path']) ? filter_input(INPUT_POST, 'image_path') : NULL;

            try{
                $users = $this->usersService->editThisUser($id, $name, $email, $title, $description, $password, $link_twtr, $link_lnkdn, $link_fbook, $link_github, $image_path);
                $this->redirect('index.php');
                return;
        }catch(Exception $e){
            $this->showError("Application error", $e->getMessage());
        }
        
        include 'view/users.php';
    }

    public function myProfile($id){
        $users = $this->usersService->getUser($id);
        include 'view/users.php';
    }

    public function authenticateUser() {
        
    }

    public function saveUser() {
        $name = '';
        $email = '';
        $title = '';
        $description ='';
        $password = '';
        $link_twtr = '';
        $link_lnkdn='';
        $link_fbook='';
        $link_github='';
        $image_path='';

        $errors = array();

        if (isset($_POST['form-submitted'])) {
            $name = isset($_POST['name']) ? filter_input(INPUT_POST, 'name') : NULL;
            $password = isset($_POST['password']) ? filter_input(INPUT_POST, 'password') : NULL;
            $email = isset($_POST['email']) ? filter_input(INPUT_POST, 'email') : NULL;
            $title = isset($_POST['title']) ? filter_input(INPUT_POST, 'title') : NULL;
            $description = isset($_POST['description']) ? filter_input(INPUT_POST, 'description') : NULL;
            $link_twtr = isset($_POST['link_twitter']) ? filter_input(INPUT_POST, 'link_twitter') : NULL;
            $link_lnkdn = isset($_POST['link_twitter']) ? filter_input(INPUT_POST, 'link_linkedin') : NULL;
            $link_fbook = isset($_POST['link_facebook']) ? filter_input(INPUT_POST, 'link_facebook') : NULL;
            $link_github = isset($_POST['link_github']) ? filter_input(INPUT_POST, 'link_github') : NULL;
            $image_path = isset($_POST['image_path']) ? filter_input(INPUT_POST, 'image_path') : NULL;
           
            try {
                $this->usersService->createNewUser($name, $email, md5($password), $title, $description, $link_twtr, $link_lnkdn, $link_fbook, $link_github, $image_path);
                $this->redirect('login.php');
                return;
            } catch (Exception $e) {
                $this->showError("Application error", $e->getMessage());
            }
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['id'] = $user->id;
        $_SESSION['name'] = $user->name;
        $_SESSION['email'] = $user->email;
        $this->redirect("../view/users.php");
    }

    public function showError($title, $message) {
        include 'view/error.php';
    }

}
