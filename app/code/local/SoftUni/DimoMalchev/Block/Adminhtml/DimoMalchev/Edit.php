<?php

class SoftUni_DimoMalchev_Block_Adminhtml_DimoMalchev_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
    
    public function __construct() {
        
        parent::__construct();
        
        $this->_objectId = 'id';
        $this->_blockGroup = 'softuni_dimomalchev';
        $this->_controller = 'adminhtml_dimomalchev';
        
        $this->_updateButton('save', 'label', Mage::helper('softuni_dimomalchev')->__('Save Submission'));
        $this->_updateButton('delete', 'label', Mage::helper('softuni_dimomalchev')->__('Delete Submission'));
        
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);
        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('block_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'block_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'block_content');
                }
            }
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }";
    }
    
    public function getHeaderText()
    {
        if (Mage::registry('softuni_dimomalchev_dimomalchev')->getId()) {
            return Mage::helper('softuni_dimomalchev')->__("Edit Submission '%s'", $this->escapeHtml(Mage::registry('softuni_dimomalchev_dimomalchev')->getName()));
        } else {
            return Mage::helper('softuni_dimomalchev')->__('New Submission');
        }
    }
}