<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicule $vehicule
 */
use Cake\ORM\Table;
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehicule'), ['action' => 'edit', $vehicule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehicule'), ['action' => 'delete', $vehicule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehicules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Defectuosites'), ['controller' => 'Defectuosites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Defectuosite'), ['controller' => 'Defectuosites', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehicules view large-9 medium-8 columns content">
    <h3><?= h($vehicule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $vehicule->has('user') ? $this->Html->link($vehicule->user->id, ['controller' => 'Users', 'action' => 'view', $vehicule->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Marque') ?></th>
            <td><?= h($vehicule->marque) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modele') ?></th>
            <td><?= h($vehicule->modele) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($vehicule->slug) ?></td>
        </tr>
        <!--<tr>-->
            <!--<th scope="row"><?= __('Id') ?></th>-->
            <!--<td><?= $this->Number->format($vehicule->id) ?></td>-->
        <!--</tr>-->
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($vehicule->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($vehicule->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Defectuosites') ?></h4>
        <?php if (!empty($vehicule->defectuosites)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <!--<th scope="col"><?= __('Id') ?></th>-->
                <th scope="col"><?= __('Vehicule Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vehicule->defectuosites as $defectuosites): ?>
            <tr>
                <td><?= h($defectuosites->id) ?></td>
                <!--<td><?= h($defectuosites->vehicule_id) ?></td>-->
                <td><?= h($defectuosites->description) ?></td>
                <td><?= h($defectuosites->slug) ?></td>
                <td><?= h($defectuosites->created) ?></td>
                <td><?= h($defectuosites->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Defectuosites', 'action' => 'view', $defectuosites->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Defectuosites', 'action' => 'edit', $defectuosites->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Defectuosites', 'action' => 'delete', $defectuosites->id], ['confirm' => __('Are you sure you want to delete # {0}?', $defectuosites->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    
    
    
    <h1>Uploaded Files</h1>
<div class="content">
    <!-- Table -->
    <table class="table">
        <tr>
            <th width="5%">#</th>
            <th width="20%">File</th>
            <th width="12%">Upload Date</th>
        </tr>
        <?php if($filesRowNum > 0):$count = 0; foreach($files as $file): $count++;?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><embed src="<?= $file->path.$file->name ?>" width="220px" height="150px"></td>
            <td><?php echo $file->created; ?></td>
        </tr>
        <?php endforeach; else:?>
        <tr><td colspan="3">No file(s) found......</td>
        <?php endif; ?>
    </table>
</div>
    
    
    
</div>


