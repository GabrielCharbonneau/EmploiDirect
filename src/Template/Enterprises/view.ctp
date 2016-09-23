<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Enterprise'), ['action' => 'edit', $enterprise->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Enterprise'), ['action' => 'delete', $enterprise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enterprise->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Enterprises'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Enterprise'), ['action' => 'add']) ?> </li>
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
            <th scope="row"><?= __('Email Address') ?></th>
            <td><?= h($enterprise->email_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($enterprise->id) ?></td>
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
            <?php foreach ($enterprise->offers as $offers): ?>
            <tr>
                <td><?= h($offers->name) ?></td>
                <td><?= h($offers->jobName) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Offers', 'action' => 'view', $offers->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>