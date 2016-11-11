<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Postulation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offers'), ['controller' => 'Offers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Enterprises'), ['controller' => 'Enterprises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?></li>

    </ul>
</nav>
<div class="postulations index large-9 medium-8 columns content">
    <h3><?= __('Postulations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Date Postulation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Offer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Presentation Letter') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($postulations2 as $postulation): ?>
            <tr>
                <td><?= h($postulation->DatePostulation) ?></td>
                <td><?= $this->Html->link(__('View offer'), ['controller' => 'Offers', 'action' => 'view', $postulation->idOffer]) ?></td>
                <td><?= h($postulation->PresentationLetter) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $postulation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $postulation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $postulation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $postulation->id)]) ?>
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

