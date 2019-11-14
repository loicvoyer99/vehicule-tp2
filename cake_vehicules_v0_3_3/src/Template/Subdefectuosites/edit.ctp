<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subdefectuosite $subdefectuosite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $subdefectuosite->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $subdefectuosite->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Subdefectuosites'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Defectuosites'), ['controller' => 'Defectuosites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Defectuosite'), ['controller' => 'Defectuosites', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subdefectuosites form large-9 medium-8 columns content">
    <?= $this->Form->create($subdefectuosite) ?>
    <fieldset>
        <legend><?= __('Edit Subdefectuosite') ?></legend>
        <?php
            echo $this->Form->control('defectuosite_id', ['options' => $defectuosites, 'empty' => true]);
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
