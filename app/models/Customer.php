<?php
class Customer extends ApplicationModel
{
    static $dao;

    public static function getDao() {
        if ( !isset(self::$dao) ) {
            self::$dao = new Customer();
        }
        return self::$dao;
    }
}
