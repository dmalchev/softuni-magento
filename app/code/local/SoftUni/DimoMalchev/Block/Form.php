<?php

class SoftUni_DimoMalchev_Block_Form extends Mage_Core_Block_Template {
    
    public function getActionUrl() {
        return $this->getUrl('softuni_dimomalchev/form/post');
    }
}