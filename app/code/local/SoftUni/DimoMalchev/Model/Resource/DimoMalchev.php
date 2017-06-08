<?php

class SoftUni_DimoMalchev_Model_Resource_DimoMalchev extends Mage_Core_Model_Resource_Db_Abstract {
    
    protected function _construct() {
        $this->_init('softuni_dimomalchev/dimomalchev', 'id');
    }
}