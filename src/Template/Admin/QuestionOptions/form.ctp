<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php

$this->extend('Vamshop/Core./Common/admin_edit');

$this->Breadcrumbs->add(__('Question Options'), ['action' => 'index']);
$action = $this->request->param('action');

if ($action == 'edit'):
    $this->Breadcrumbs->add($questionOption->id);
else:
    $this->Breadcrumbs->add(__d('vamshop', 'Add'), $this->request->here());
endif;

$this->append('action-buttons');
    echo $this->Vamshop->adminAction(__('Delete'),
        ['action' => 'delete', $questionOption->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $questionOption->id)]
    );
    echo $this->Vamshop->adminAction(__('List Question Options'),
        ['action' => 'index']
    );
    echo $this->Vamshop->adminAction(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']);
    echo $this->Vamshop->adminAction(__('New Question'), ['controller' => 'Questions', 'action' => 'add']);
$this->end();
$this->append('form-start', $this->Form->create($questionOption));

$this->append('tab-heading');
    echo $this->Vamshop->adminTab('Question Option', '#question-option');
$this->end();

$this->append('tab-content');
    echo $this->Html->tabStart('question-option');
        echo $this->Form->input('question_id', ['options' => $questions, 'empty' => true]);
        echo $this->Form->input('options');
        echo $this->Form->input('point', [
            'default' => 1,
        ]);
    echo $this->Html->tabEnd();
    echo $this->Vamshop->adminTabs();
$this->end();
