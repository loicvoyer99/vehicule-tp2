<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Defectuosite[]|\Cake\Collection\CollectionInterface $defectuosites
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Defectuosite'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicule'), ['controller' => 'Vehicules', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subdefectuosites'), ['controller' => 'Subdefectuosites', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="defectuosites index large-9 medium-8 columns content">
    <h3><?= __('Defectuosites') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!--<th scope="col"><?= $this->Paginator->sort('id') ?></th>-->
                <!--<th scope="col"><?= $this->Paginator->sort('vehicule_id') ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('created') ?></th>-->
                <!--<th scope="col"><?= $this->Paginator->sort('modified') ?></th>-->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($defectuosites as $defectuosite): ?>
            <tr>
                <!--<td><?= $this->Number->format($defectuosite->id) ?></td>-->
                <!--<td><?= $defectuosite->has('vehicule') ? $this->Html->link($defectuosite->vehicule->marque, ['controller' => 'Vehicules', 'action' => 'view', $defectuosite->vehicule->id]) : '' ?></td>-->
                <td><?= h($defectuosite->description) ?></td>
                <td><?= h($defectuosite->slug) ?></td>
                <!--<td><?= h($defectuosite->created) ?></td>-->
                <!--<td><?= h($defectuosite->modified) ?></td>-->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $defectuosite->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $defectuosite->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $defectuosite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $defectuosite->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
