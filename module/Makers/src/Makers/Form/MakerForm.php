<?php
// module/makers/src/Makers/Form/MakerForm.php:
namespace Makers\Form;

use Zend\Form\Form;

class MakerForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('maker');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
		
        $this->add(array(
            'name' => 'maker_name',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Maker Name',
            ),
        ));
        $this->add(array(
            'name' => 'maker_logo',
            'attributes' => array(
                'type'  => 'file',
            ),
            'options' => array(
                'label' => 'Logo',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}