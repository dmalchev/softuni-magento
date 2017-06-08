<?php

class SoftUni_DimoMalchev_FormController extends Mage_Core_Controller_Front_Action {
    
    public function indexAction() {
        
        $this->loadLayout();
        $this->_initLayoutMessages('customer/session');
        $this->renderLayout();
    }
    
    public function postAction() {
        
        $post = Mage::app()->getRequest()->getPost();
        
        if ( $post ) {
            try {
                $error = false;

                if (!Zend_Validate::is(trim($post['name']) , 'NotEmpty')) {
                    $error = true;
                }

                if (!Zend_Validate::is(trim($post['phone']) , 'NotEmpty')) {
                    $error = true;
                }
                
                if (!Zend_Validate::is(trim($post['age']), 'Int')) {
                    $error = true;
                }

                if (!Zend_Validate::is(trim($post['email']), 'EmailAddress')) {
                    $error = true;
                }

                if ($error) {
                    throw new Exception();
                }
                
                $dmModel = Mage::getModel('softuni_dimomalchev/dimomalchev');
                $dmModel->setData($post);
                $dmModel->save();

                Mage::getSingleton('customer/session')->addSuccess(Mage::helper('softuni_dimomalchev')->__('Thank you for contacting us'));
                $this->_redirect('*/*/');

                return;
            } catch (Exception $e) {
                Mage::getSingleton('customer/session')->addError(Mage::helper('softuni_dimomalchev')->__('Unable to submit your request. Please, try again later'));
                $this->_redirect('*/*/');
                
                return;
            }

        } else {
            $this->_redirect('*/*/');
        }
    }
}