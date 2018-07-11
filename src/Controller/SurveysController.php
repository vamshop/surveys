<?php

namespace Surveys\Controller;

use Vamshop\Core\Controller\AppController as VamshopController;

class SurveysController extends VamshopController
{

    public function view($id = null)
    {
        $survey = $this->Surveys->find('surveyQuestions', [
            'id' => $id,
        ])->firstOrFail();
        $this->set(compact('survey'));
    }

}
