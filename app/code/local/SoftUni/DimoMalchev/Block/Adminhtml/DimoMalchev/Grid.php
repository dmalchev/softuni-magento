<?php

class SoftUni_DimoMalchev_Block_Adminhtml_DimoMalchev_Grid extends Mage_Adminhtml_Block_Widget_Grid {
    
    public function __construct() {
        
        parent::__construct();
        
        $this->setId('softuniDimoMalchevGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('DESC');
    }
    
    protected function _prepareCollection() {
        
        $collection = Mage::getModel('softuni_dimomalchev/dimomalchev')->getCollection();
        $this->setCollection($collection);
        
        return parent::_prepareCollection();
    }
    
    protected function _prepareColumns() {
        
        $this->addColumn('id', array(
            'header'    => Mage::helper('softuni_dimomalchev')->__('ID'),
            'type'      => 'number',
            'index'     => 'id',
        ));
        
        $this->addColumn('name', array(
            'header'    => Mage::helper('softuni_dimomalchev')->__('Name'),
            'type'      => 'text',
            'index'     => 'name',
        ));
        
        $this->addColumn('phone', array(
            'header'    => Mage::helper('softuni_dimomalchev')->__('Phone'),
            'type'      => 'text',
            'index'     => 'phone',
        ));
        
        $this->addColumn('age', array(
            'header'    => Mage::helper('softuni_dimomalchev')->__('Age'),
            'type'      => 'number',
            'index'     => 'age',
        ));
        
        $this->addColumn('email', array(
            'header'    => Mage::helper('softuni_dimomalchev')->__('E-mail'),
            'type'      => 'text',
            'index'     => 'email',
        ));
        
        return parent::_prepareColumns();
    }
    
    public function getRowUrl($row) {
        
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}