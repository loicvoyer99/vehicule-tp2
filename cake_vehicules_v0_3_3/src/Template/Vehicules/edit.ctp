<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicule $vehicule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vehicule->slug],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vehicule->slug)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vehicules'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Defectuosites'), ['controller' => 'Defectuosites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Defectuosite'), ['controller' => 'Defectuosites', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicules form large-9 medium-8 columns content">
    <?= $this->Form->create($vehicule) ?>
    <fieldset>
        <legend><?= __('Edit Vehicule') ?></legend>
        <?php
            //echo $this->Form->control('user_id', ['options' => $user]);
            echo $this->Form->control('marque');
            echo $this->Form->control('modele');
            echo $this->Form->control('slug');
            //echo $this->Form->control('tags._ids', ['options' => $tags]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
