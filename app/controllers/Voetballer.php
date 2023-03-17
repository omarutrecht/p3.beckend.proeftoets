<?php

class Voetballer extends BaseController
{
    private $voetballerModel;

    public function __construct()
    {
        $this->voetballerModel = $this->model('VoetballerModel');
    }

    public function index()
    {
        $result = $this->voetballerModel->getVoetballer();

        $rows = '';
        foreach ($result as $voetballer) {
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
