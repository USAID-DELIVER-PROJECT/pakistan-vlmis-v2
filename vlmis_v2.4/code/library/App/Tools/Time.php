<?php

class App_Tools_Time {

    /**
     * Return current datetime
     *
     * @return string
     */
    public static function now($type = 'datetime') {
        switch ($type) {
            case 'time':
                return new \DateTime(date('H:i:s'));
                break;
            case 'datetime':
                return new \DateTime(date('Y-m-d H:i:s'));
                break;
            case 'date':
                return new \DateTime(date('Y-m-d'));
                break;
            default:
                return new \DateTime(date('Y-m-d H:i:s'));
        }
    }

    /**
     * Compare $date with current time.
     * Returns TRUE if $date is earlier then now. Otherwhise returns FALSE.
     * @param Zend_Date $date
     */
    public static function isEarlier($date) {
        $now = new Zend_Date(self::now(), Zend_Date::ISO_8601);

        return ($now->compare($date) == 1) ? TRUE : FALSE;
    }

    /**
     * Compare $date with current time.
     * Returns TRUE if $date is later then now. Otherwhise returns FALSE.
     * @param Zend_Date $date
     */
    public static function isLater($date) {
        $now = new Zend_Date(self::now(), Zend_Date::ISO_8601);

        return ($now->compare($date) == 1) ? FALSE : TRUE;
    }

}
