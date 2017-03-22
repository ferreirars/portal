<?php
public $validate = array(
    'username' => array(
        'notempty' => array(
            'rule' => array('notempty'),
            'message' => 'Username cannot be empty',
        ),
        'unique' => array(
            'rule' => array('isUnique'),
            'message' => 'That username already exists. Please choose another',
            'on'=>'create',
        ),
        'alphaNumeric' => array(
            'rule' => 'alphaNumeric',
            'required' => true,
            'message' => 'Username can consist of letters and numbers only'
        ),
        'between' => array(
            'rule' => array('between', 5, 15),
            'message' => 'Username must be Between 5 and 15 characters'
        )
    ),
    'email' => array(
        'email' => array(
            'rule' => array('email'),
            'message' => 'Please use a valid email',
        ),
        'notempty' => array(
            'rule' => array('notEmpty'),
            'message'=> 'Email cannot be empty',
        ),
        'unique' => array(
            'rule' => 'isUnique',
            'message' => 'The email you entered has already been registered',
            'on'=>'create'
        ),
    ),
    'password' => array(
        'notempty' => array(
            'rule' => array('notempty'),
            'message' => 'Password cannot be empty',
        ),
        'mingLength' => array(
            'rule' => array('minLength', 6),
            'message' => 'Mimimum 6 characters long',
        ),
        'maxgLength' => array(
            'rule' => array('maxLength', 30),
            'message' => 'Maximum 30 characters long',
        )
    ),
);


