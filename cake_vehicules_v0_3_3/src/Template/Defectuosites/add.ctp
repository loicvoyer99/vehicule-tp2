<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Subdefectuosites",
    "action" => "getByDefectuosite",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Defectuosites/add', ['block' => 'scriptBottom']);
?><?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Defectuosite $defectuosite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Defectuosites'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicule'), ['controller' => 'Vehicules', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="defectuosites form large-9 medium-8 columns content">
    <?= $this->Form->create($defectuosite) ?>
    <fieldset>
        <legend><?= __('Add Defectuosite') ?></legend>
        <?php
            echo $this->Form->control('vehicule_id', ['options' => $vehicules]);
            echo $this->Form->control('description');
            //ajout des deux
            ?> <h1>LISTE LIÉE AVEC DEFECTUOSITE ET SUBDEFECTUOSITE</h1> <?php
            echo $this->Form->control('defectuosite_id', ['options' => $defectuosites]);
            echo $this->Form->control('subdefectuosite_id', ['options' => $subdefectuosites]);
            
            echo $this->Form->control('slug');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
