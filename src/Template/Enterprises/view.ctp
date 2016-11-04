<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Enterprise'), ['action' => 'edit', $enterprise->id]) ?> </li>
        <li><?= $this->Html->link(__('List Enterprises'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Offers'), ['controller' => 'Offers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Offer'), ['controller' => 'Offers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="enterprises view large-9 medium-8 columns content">
    <h3><?= h($enterprise->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($enterprise->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($enterprise->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Histoire') ?></th>
            <td><?= h($enterprise->histoire) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Domaine d\'affaire') ?></th>
            <td><?= h($enterprise->domaine_affaire) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Culture') ?></th>
            <td><?= h($enterprise->culture) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Action') ?></th>
            <td><?= $this->Html->link(__('Edit Enterprise'), ['action' => 'edit', $enterprise->id]) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Offers') ?></h4>
        <?php if (!empty($enterprise->offers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('JobName') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($enterprise->offers as $offer): if(strtotime($offer->publicationBeginningDate) <= time() && strtotime($offer->publicationEndDate) >= time()) : if($offer['active']) : ?>
            <tr>
                <td><?= h($offer->name) ?></td>
                <td><?= h($offer->jobName) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Offers', 'action' => 'view', $offer->id]) ?>
                </td>
            </tr>
            <?php endif;endif;endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>