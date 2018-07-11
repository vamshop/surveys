<?php

namespace Surveys\Controller\Admin;

use Vamshop\Core\Controller\Admin\AppController as VamshopController;

/**
 * SubmissionDetails Controller
 *
 * @property \Surveys\Model\Table\SubmissionDetailsTable $SubmissionDetails
 */
class SubmissionDetailsController extends VamshopController
{

    /**
     * Index method
     */
    public function index()
    {
        $this->Crud->listener('relatedModels')->relatedModels(true);
        return $this->Crud->execute();
    }

    /**
     * View method
     */
    public function view($id = null)
    {
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
