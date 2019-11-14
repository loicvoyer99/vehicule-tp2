<div class="articles view large-9 medium-8 columns content">
    <h3><?= h($vehicule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('description') ?></th>
            <td><?= h($vehicule->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('slug') ?></th>
            <td><?= h($vehicule->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('created') ?></th>
            <td><?= h($vehicule->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('modified') ?></th>
            <td><?= h($vehicule->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Id') ?></h4>
        <?= $this->Text->autoParagraph(h($vehicule->id)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Defectuosites') ?></h4>
        <?php if (!empty($vehicule->defectuosites)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('description') ?></th>
                <th scope="col"><?= __('slug') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
            </tr>
            <?php foreach ($vehicule->defectuosites as $defectuosites): ?>
            <tr>
                <td><?= h($defectuosites->description) ?></td>
                <td><?= h($defectuosites->slug) ?></td>
                <td><?= h($defectuosites->created) ?></td>
                <td><?= h($defectuosites->modified) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
