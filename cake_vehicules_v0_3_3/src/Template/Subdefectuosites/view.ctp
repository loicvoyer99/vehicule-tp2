<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subdefectuosite $subdefectuosite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subdefectuosite'), ['action' => 'edit', $subdefectuosite->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subdefectuosite'), ['action' => 'delete', $subdefectuosite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subdefectuosite->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subdefectuosites'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subdefectuosite'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Defectuosites'), ['controller' => 'Defectuosites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Defectuosite'), ['controller' => 'Defectuosites', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subdefectuosites view large-9 medium-8 columns content">
    <h3><?= h($subdefectuosite->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Defectuosite') ?></th>
            <td><?= $subdefectuosite->has('defectuosite') ? $this->Html->link($subdefectuosite->defectuosite->id, ['controller' => 'Defectuosites', 'action' => 'view', $subdefectuosite->defectuosite->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($subdefectuosite->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subdefectuosite->id) ?></td>
        </tr>
    </table>
</div>
