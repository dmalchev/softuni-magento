<?php

class SoftUni_DimoMalchev_Block_Adminhtml_DimoMalchev_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {
    
    public function __construct() {
        
        parent::__construct();
        $this->setId('softuni_dimomalchev_dimomalchev_form');
        $this->setTitle(Mage::helper('softuni_dimomalchev')->__('Submission Information'));
    }
    
    protected function _prepareForm() {
        
        parent::_prepareForm();
        
        $model = Mage::registry('softuni_dimomalchev_dimomalchev');
        
        $form = new Varien_Data_Form(array(
            'id'     => 'edit_form',
            'action' => $this->getUrl('adminhtml/softuni_dimomalchev_dimomalchev/save'),
            'method' => 'post'
        ));
        
        $form->setHtmlIdPrefix('softuni_dimomalchev_dimomalchev_');
        
        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend' => Mage::helper('cms')->__('General Information'),
            'class' => 'fieldset-wide'
        ));
        
        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', array(
                'name' => 'id',
            ));
        }
        
        $fieldset->addField('name', 'text', array(
            'name'      => 'name',
            'label'     => Mage::helper('softuni_dimomalchev')->__('Name'),
            'title'     => Mage::helper('softuni_dimomalchev')->__('Name'),
            'required'  => true,
        ));
        
        $fieldset->addField('phone', 'text', array(
            'name'      => 'phone',
            'label'     => Mage::helper('softuni_dimomalchev')->__('Phone'),
            'title'     => Mage::helper('softuni_dimomalchev')->__('Phone'),
            'required'  => true,
        ));
        
        $fieldset->addField('age', 'text', array(
            'name'      => 'age',
            'label'     => Mage::helper('softuni_dimomalchev')->__('Age'),
            'title'     => Mage::helper('softuni_dimomalchev')->__('Age'),
            'required'  => true,
        ));
        
        $fieldset->addField('email', 'text', array(
            'name'      => 'email',
            'label'     => Mage::helper('softuni_dimomalchev')->__('E-mail'),
            'title'     => Mage::helper('softuni_dimomalchev')->__('E-mail'),
            'required'  => true,
        ));
        
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
    }
}