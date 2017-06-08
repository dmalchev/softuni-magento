<?php

class SoftUni_DimoMalchev_Softuni_DimoMalchev_DimoMalchevController extends Mage_Adminhtml_Controller_Action {

    public function indexAction() {
        
        $this->loadLayout();
        $this->renderLayout();
    }

    public function newAction() {
        $this->_forward('edit');
    }

    public function editAction() {
        
        $this->_title($this->__('Submission'));
        
        $dimomalchevId = $this->getRequest()->getParam('id');
        $model = Mage::getModel('softuni_dimomalchev/dimomalchev');
        
        if ($dimomalchevId) {
            $model->load($dimomalchevId);
            
            if (!$model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError(
                    Mage::helper('softuni_dimomalchev')->__('This submission no longer exists.')
                );
                $this->_redirect('*/*/');
                return;
            }
        }
        
        $this->_title($model->getId() ? $model->getName() : $this->__('New Submission'));
        
        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        
        Mage::register('softuni_dimomalchev_dimomalchev', $model);
        
        $this->loadLayout();
        $this->renderLayout();
    }
    
    public function saveAction() {
        
        if ($data = $this->getRequest()->getPost()) {
            
            $dimomalchevId = $this->getRequest()->getParam('id');
            $model = Mage::getModel('softuni_dimomalchev/dimomalchev')->load($dimomalchevId);
            
            if (!$model->getId() && $dimomalchevId) {
                
                Mage::getSingleton('adminhtml/session')->addError(
                    Mage::helper('softuni_dimomalchev')->__('This submission no longer exists.')
                );
                $this->_redirect('*/*/index');
                return;
            }
            
            $model->setData($data);
            
            try {
                
                $model->save();
                
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('softuni_dimomalchev')->__('The submission has been saved.')
                );
                
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                    return;
                }
                
                $this->_redirect('*/*/index');
                return;
            } catch (Exception $e) {
                
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        
        $this->_redirect('*/*/index');
    }
    
    public function deleteAction() {
        
        if ($dimomalchevId = $this->getRequest()->getParam('id')) {
            
            try {
                
                $model = Mage::getModel('softuni_dimomalchev/dimomalchev');
                $model->load($dimomalchevId);
                $model->delete();
                
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('softuni_dimomalchev')->__('The submission has been deleted.')
                );
            
                $this->_redirect('*/*/index');
                return;
            } catch (Exception $e) {
            
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
               
                $this->_redirect('*/*/edit', array('id' => $dimomalchevId));
                return;
            }
        }
        
        Mage::getSingleton('adminhtml/session')->addError(
            Mage::helper('softuni_dimomalchev')->__('Unable to find a submission to delete.')
        );
        
        $this->_redirect('*/*/index');
    }

    protected function _isAllowed() {
        
        return Mage::getSingleton('admin/session')->isAllowed('admin/softuni_dimomalchev');
    }

}
