<?php

class Voetballer extends BaseController
{


    public function index()
    {
        $data = [
            'title' => 'best betaalde voetballers ter wereld'
        ];
    
    
        $this->view('Voetballer/index', $data);

    }
   
}