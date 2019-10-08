<?php
namespace App;

use Kris\LaravelFormBuilder\Form;

class KendaraanForm extends Form
{
    public function buildForm()
    {
        $this
        ->add('nopol')
        ->add('pemilik_id')
        ->add('deposit')
        ->add("Simpan", "submit")
        ;
    }
    public function getPenyewa()
    {
        return User::pluck("username", "id")->toArray();
    }
}