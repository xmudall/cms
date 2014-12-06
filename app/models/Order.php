<?php
class Order extends ApplicationModel
{
    static $dao;

    public static function getDao() {
        if ( !isset(self::$dao) ) {
            self::$dao = new Order();
        }
        return self::$dao;
    }
}
