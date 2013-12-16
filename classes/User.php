<?php 
class User extends FileHandler{
    public $name;

    public function sendTo($name,$text){
        $msg = new Message;
        $msg->add(array(
            'time' => time(),
            'from' => $this->name,
            'to' => $name,
            'message' => $text
        ));
        $this->updateLastActivity();
    }

    public function exists($name){
        if(empty($this->getByName($name)))
            return false;
        return true;
    }

    public function login($name){
        $this->name = $name;
        $_SESSION['user'] = $name;
        $fields = $this->getByName($name);
        if(empty($fields)){
            $this->add(array(
                'name' => $name,
                'last_activity' => time()
            ));
        }else{
            $this->updateLastActivity();
        }
    }

    public function loggedIn(){
        if(isset($_SESSION['user'])){
            $this->login($_SESSION['user']);
            return true;
        }
        return false;
    }

    public function updateLastActivity(){
        $this->setWhereName($this->name,array('last_activity'=>time()));
    }
}