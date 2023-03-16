<?php

class Voetballer extends BaseController
{
    private $voetballerModel;

    public function __construct()
    {
        $voetballerModel = $this->model('VoetballerModel');
    }

    public function index()
    {
        $voetballerModel = $this->model('VoetballerModel');
       
        //$var_dump($result);

        $rows = '';
        foreach($voetballerModel as $voetballer){
            $rows .= "<tr>
                      <td>$voetballer->Naam</td>
                      <td>$voetballer->Club</td>
                      <td>$voetballer->Leeftijd</td>
                      <td>$voetballer->Nationaliteit</td>
                      <td>$voetballer->Salaris</td>
                      </tr>";
        
        }

        $data = [
            'title' => 'de best betaalde voetballers ter wereld!',
            'rows' => $rows
        ];
    
    
        $this->view('Voetballer/index', $data);

    }
   
}