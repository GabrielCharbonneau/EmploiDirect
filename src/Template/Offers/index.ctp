<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Offer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Offers'), ['controller' => 'Offers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Enterprises'), ['controller' => 'Enterprises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div style="text-align: right; padding-right: 200px; padding-top: 20px;">
<span style="background-color: #bbf0ff">
<?= $this->Html->link(__('Research an offer'), ['action' => 'research']) ?>
</span>
</div>
<div class="offers index large-9 medium-8 columns content">
    <h3><?= __('Offers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Job Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Scholarity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Sector') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Job') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Job Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Job Situation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Job Beginning Date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enterprise_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($offers as $offer): if(strtotime($offer->publicationBeginningDate) <= time() && strtotime($offer->publicationEndDate) >= time()) : if($offer['active']) : ?>
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
                </td>
            </tr>
            <?php endif; endif; endforeach; ?>
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
