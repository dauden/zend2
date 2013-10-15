<?php

// module/Makers/src/Makers/Controller/MakerController.php:

namespace Makers\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Form\FormInterface;
use Makers\Model\Maker;          // <-- Add this import
use Makers\Form\MakerForm; 

class MakerController extends AbstractActionController {
    
    public function indexAction() {
        return array(
            'Makers' => Maker::all()
        );
    }

    public function addAction() {
        $form = new MakerForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $maker = new Maker();
            $form->setInputFilter($maker->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $maker->exchangeArray($form->getData());
                $maker->save();

                // Redirect to list of albums
                return $this->redirect()->toRoute('maker');
            }
        }
        return array('form' => $form);
    }

    public function editAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('maker', array(
                'maker' => 'add'
            ));
        }
        
        $maker = Maker::find($id);
        $form  = new MakerForm();
        $form->bind($maker);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($maker->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $maker->exchangeArray($form->getData(FormInterface::VALUES_AS_ARRAY));
                $maker->save();
                // Redirect to list of makers
                return $this->redirect()->toRoute('maker');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('maker');
        }
        
        $maker = Maker::find($id);
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $maker->delete();
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('maker');
        }

        return array(
            'id'    => $id,
            'maker' => $maker
        );
    }

}
