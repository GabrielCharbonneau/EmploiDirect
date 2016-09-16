<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Offer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Enterprises'), ['controller' => 'Enterprises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Enterprise'), ['controller' => 'Enterprises', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="offers index large-9 medium-8 columns content">
    <h3><?= __('Offers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('jobName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scholarity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sector') ?></th>
                <th scope="col"><?= $this->Paginator->sort('job') ?></th>
                <th scope="col"><?= $this->Paginator->sort('jobType') ?></th>
                <th scope="col"><?= $this->Paginator->sort('jobSituation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('jobBeginningDate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enterprise_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($offers as $offer): ?>
            <tr>
                <td><?= h($offer->name) ?></td>
                <td><?= h($offer->jobName) ?></td>
                <td><?= h($offer->scholarity) ?></td>
                <td><?= h($offer->sector) ?></td>
                <td><?= h($offer->job) ?></td>
                <td><?= h($offer->jobType) ?></td>
                <td><?= h($offer->jobSituation) ?></td>
                <td><?= h($offer->jobBeginningDate) ?></td>
                <td><?= $offer->has('enterprise') ? $this->Html->link($offer->enterprise->name, ['controller' => 'Enterprises', 'action' => 'view', $offer->enterprise->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $offer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $offer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $offer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offer->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
