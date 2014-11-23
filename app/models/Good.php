<?php
class Good extends ApplicationModel
{
    static $dao;

    public static function getDao() {
        if ( !isset(self::$dao) ) {
            self::$dao = new Good();
        }
        return self::$dao;
    }
}
