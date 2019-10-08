<?php

namespace App;

use Kris\LaravelFormBuilder\Form;

class LoginForm extends Form
{
    public function buildForm()
    {
        $this 
   		->add("username", 'text') 
   		->add("password", 'password') 
   		->add("Login", "submit") ;
    }
}
