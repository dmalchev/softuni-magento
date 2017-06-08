<?php

class SoftUni_DimoMalchev_Block_Adminhtml_DimoMalchev extends Mage_Adminhtml_Block_Widget_Grid_Container {
    
    public function __construct() {
        
        $this->_blockGroup = 'softuni_dimomalchev';
        $this->_controller = 'adminhtml_dimomalchev';
        $this->_headerText = Mage::helper('softuni_dimomalchev')->__('Submissions');
        $this->_addButtonLabel = Mage::helper('softuni_dimomalchev')->__('Add New Submission');
        
        parent::__construct();
    }
}