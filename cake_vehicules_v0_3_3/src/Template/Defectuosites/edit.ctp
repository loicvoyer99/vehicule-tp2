<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Defectuosite $defectuosite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $defectuosite->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $defectuosite->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Defectuosites'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicule'), ['controller' => 'Vehicules', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="defectuosites form large-9 medium-8 columns content">
    <?= $this->Form->create($defectuosite) ?>
    <fieldset>
        <legend><?= __('Edit Defectuosite') ?></legend>
        <?php
            echo $this->Form->control('vehicule_id', ['options' => $vehicules]);
            echo $this->Form->control('description');
            echo $this->Form->control('slug');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
