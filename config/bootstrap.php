<?php

use Vamshop\Core\Vamshop;

Vamshop::hookAdminRowAction('Surveys.Admin/Surveys/index', 'Questions',
    'prefix:admin/plugin:Surveys/controller:Questions/action:index/?survey_id=:id'
);
Vamshop::hookAdminRowAction('Surveys.Admin/Questions/index', 'Options',
    'prefix:admin/plugin:Surveys/controller:QuestionOptions/action:index/?question_id=:id'
);
