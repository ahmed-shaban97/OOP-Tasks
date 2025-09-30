<?php
class Session {


    public static function start() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }


    public static function get($key) {
        return $_SESSION[$key] ?? null;
    }


    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }


    public static function flash($key) {
        if (isset($_SESSION[$key])) {
            $value = $_SESSION[$key];
            unset($_SESSION[$key]);
            return $value;
        }
        return null;
    }


    public static function remove($key) {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }


    public static function removeAll() {
        session_destroy();
        $_SESSION = [];
    }


    public static function getAll() {
        return $_SESSION;
    }


    public static function check($key) {
        return isset($_SESSION[$key]);
    }
}