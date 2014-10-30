<?php
class User extends ApplicationModel {

    static $dao;

    public static function getDao() {
        if ( !isset(self::$dao) ) {
            self::$dao = new User();
        }
        return self::$dao;
    }

    public function login($username, $password) {
        $user = User::findFirst(array(
            "username = :username: AND password = :password:",
            "bind" => array(
                'username' => $username,
                'password' => $password,
            ),
        ));
        return $user;
    }
}
