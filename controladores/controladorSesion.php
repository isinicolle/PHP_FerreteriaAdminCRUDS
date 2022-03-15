<?php
    class userSession{
        public function __construct()
        {   
            session_start();
        }
        public function setUser($user){
            $_SESSION['user'] = $user;
        }
        public function getUser($user){
            return $_SESSION['user'];
        }
        public function closeSession(){
            session_unset();
            session_destroy();
        }
    }
?>