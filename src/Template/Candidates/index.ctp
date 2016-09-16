<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Candidate'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="candidates index large-9 medium-8 columns content">
    <h3><?= __('Candidates') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('FirstName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('LastName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($candidates as $candidate): ?>
            <tr>
                <td><?= h($candidate->FirstName) ?></td>
                <td><?= h($candidate->LastName) ?></td>
                <td><?= h($candidate->Address) ?></td>
                <td><?= $this->Number->format($candidate->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $candidate->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $candidate->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $candidate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id)]) ?>
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
