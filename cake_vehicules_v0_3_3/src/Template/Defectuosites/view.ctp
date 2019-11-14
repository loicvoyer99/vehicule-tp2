<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Defectuosite $defectuosite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Defectuosite'), ['action' => 'edit', $defectuosite->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Defectuosite'), ['action' => 'delete', $defectuosite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $defectuosite->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Defectuosites'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Defectuosite'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicule'), ['controller' => 'Vehicules', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="defectuosites view large-9 medium-8 columns content">
    <h3><?= h($defectuosite->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Vehicule') ?></th>
            <td><?= $defectuosite->has('vehicule') ? $this->Html->link($defectuosite->vehicule->marque, ['controller' => 'Vehicules', 'action' => 'view', $defectuosite->vehicule->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($defectuosite->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($defectuosite->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($defectuosite->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($defectuosite->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($defectuosite->modified) ?></td>
        </tr>
    </table>
</div>
