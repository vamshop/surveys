<?php

$this->extend('Vamshop/Core./Common/admin_index');
$this->Breadcrumbs->add(__('Surveys'), ['action' => 'index']);

$this->append('action-buttons');
    echo $this->Vamshop->adminAction(__('New Survey'), ['action' => 'add']);
$this->end();

$this->append('table-heading');
?>
<thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('title') ?></th>
        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
</thead>
<?php
$this->end();

$this->append('table-body');

?>
<tbody>
    <?php foreach ($surveys as $survey): ?>
        <?php $actions = []; ?>
    <tr>
        <td><?= $this->Number->format($survey->id) ?></td>
        <td><?= h($survey->title) ?></td>
        <td><?= h($survey->created) ?></td>
        <td><?= h($survey->modified) ?></td>
<?php
        $actions[] = $this->Vamshop->adminRowActions($survey->id);
        $actions[] = $this->Vamshop->adminRowAction('', ['action' => 'view', $survey->id], ['icon' => 'read']);
        $actions[] = $this->Vamshop->adminRowAction('', ['action' => 'edit', $survey->id], ['icon' => 'update']);
        $actions[] = $this->Vamshop->adminRowAction('', ['action' => 'delete', $survey->id], ['icon' => 'delete']);
?>
        <td class="actions">
            <div class="item-actions">
            <?= implode(' ', $actions); ?>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
<?php

$this->end();

?>
