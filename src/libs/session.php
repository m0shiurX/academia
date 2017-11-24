<?php

    class session
    {
        public static function init () {
            @session_start();
        }

        public static function set ($key, $value){
            $_SESSION[$key] = $value;
    		return true;
        }

        public static function get ($key){
           return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
        }

        public static function destroy ($key){
            unset($_SESSION[$key]);
        }

        public static function hashPassword($password){
            return password_hash($password, PASSWORD_DEFAULT);
        }

        public static function passwordMatch($password, $hash){
            return password_verify($password, $hash);
        }
    }
    
