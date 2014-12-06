<?php
class Orderitem extends ApplicationModel
{
    static $dao;

    public static function getDao() {
        if ( !isset(self::$dao) ) {
            self::$dao = new Orderitem();
        }
        return self::$dao;
    }
}
