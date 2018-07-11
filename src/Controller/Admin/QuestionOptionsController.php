<?php

namespace Surveys\Controller\Admin;

use Cake\Event\Event;
use Vamshop\Core\Controller\Admin\AppController as VamshopController;

/**
 * QuestionOptions Controller
 *
 * @property \Surveys\Model\Table\QuestionOptionsTable $QuestionOptions
 */
class QuestionOptionsController extends VamshopController
{

    /**
     * Initialize method
     */
    public function initialize()
    {
        parent::initialize();
        $this->Crud->config('actions.moveUp', [
            'className' => 'Vamshop/Core.Admin/MoveUp',
        ]);
        $this->Crud->config('actions.moveDown', [
            'className' => 'Vamshop/Core.Admin/MoveDown',
        ]);
    }

    /**
     * implementedEvents method
     */
    public function implementedEvents()
    {
        return parent::implementedEvents() + [
            'Crud.beforeRedirect' => 'beforeCrudRedirect',
        ];
    }

    /**
     * Index method
     */
    public function index()
    {
        $this->Crud->listener('relatedModels')->relatedModels(true);

        $this->Crud->on('afterPaginate', function(Event $event) {
            $questionId = $this->request->query('question_id');
            if ($questionId) {
                $question = $this->QuestionOptions->Questions->get($questionId);
                $this->set(compact('question'));
            }

            if (isset($question->survey_id)) {
                $survey = $this->QuestionOptions->Questions->Surveys->get($question->survey_id);
                $this->set(compact('survey'));
            }
        });
        return $this->Crud->execute();
    }

    public function beforeCrudRedirect(Event $event)
    {
        $entity = $event->subject()->entity;
        $referer = $this->request->referer();
        if (!$referer && $entity->has('question_id') && is_array($event->subject()->url)) {
            $event->subject()->url['question_id'] = $entity->get('question_id');
        } else {
            $event->subject()->url = $referer;
        }
    }

    /**
     * View method
     */
    public function view($id = null)
    {
        $this->Crud->listener('relatedModels')->relatedModels(true);
        $this->Crud->on('beforeFind', function(Event $event) {
            $event->subject()->query
                ->contain([
                    'Questions',
                    'Questions.Surveys',
                ]);
        });
        return $this->Crud->execute();
    }

    /**
     * Add method
     */
    public function add()
    {
        return $this->Crud->execute();
    }

    /**
     * Edit method
     */
    public function edit($id = null)
    {
        return $this->Crud->execute();
    }

    /**
     * Delete method
     */
    public function delete($id = null)
    {
        return $this->Crud->execute();
    }

}
