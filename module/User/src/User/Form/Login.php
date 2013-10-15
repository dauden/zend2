<?php

namespace User\Form;

use Zend\Form\Form;

class Login extends Form {

    public function __construct($name = null) {
        parent::__construct('login');
        $this->add(array(
            'name' => 'email',
            'type' => 'Zend\Form\Element\Email',
            'attributes' => array(
               'id' => 'email',
				'placeholder' =>'Email address',
				'class' =>'input-block-level' ,
				'data-rule-required' =>'true' ,
				'data-rule-email' =>'true',
            ),
        ));

        $this->add(array(
            'name' => 'password',
            'type' => 'Zend\Form\Element\Password',
            'attributes' => array(
               'id' => 'password',
				'placeholder' =>'Password',
				'class' =>'input-block-level' ,
				'data-rule-required' =>'true' ,
            ),
        ));

		 $this->add(array(
            'name' => 'remember',
            'type' => 'Zend\Form\Element\Checkbox',
			 'attributes' => array(
               'id' => 'remember',
			   	 'class'=>'icheck-me',
				 'data-skin'=>'square', 
				 'data-color'=>'blue', 
            ),
			'options' => array(
				'label' => 'Remember me',
			),
        ));
		
        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Sign in',
                'class' => 'btn btn-primary',
            ),
        ));
    }

}
