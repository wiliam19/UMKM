<?php

namespace App;

use Kris\LaravelFormBuilder\Form;

class ParkirForm extends Form
{
    public function buildForm()
    {
        $this
        ->add("kendaraan_id")
        ->add("nominal")
        ->add("status")
        ->add("petugas_id")
        
        ->add('Simpan', 'submit')
        ;
    }
}
