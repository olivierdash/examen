<?php
    namespace app\Controllers;
    use app\models\User;

    class UserController 
    {
        public static function getAll() {
            $user = new User();
            return $user->getAll();
        }

        public static function getById($userId) {
            $user = new User();
            return $user->getById($userId);
        }
    }
?>