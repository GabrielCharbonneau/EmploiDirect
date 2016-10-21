<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Offers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Enterprises'), ['controller' => 'Enterprises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Enterprise'), ['controller' => 'Enterprises', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="offers form large-9 medium-8 columns content">
    <fieldset>
        <?= $this->Form->create('Search', ['url' => ['action' => 'research']]) ?>
        <legend><?= __('Search Offer') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('jobName');
            echo $this->Form->input('sector');
            echo $this->Form->input('job');
            echo $this->Form->input('jobSituation', ['options' => ['plein'=>__('Full-Time'),'partiel' => __('Part-Time')]]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?php if(isset($offers)): ?>
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
            <?php foreach ($offers as $offer): if($offer->publicationBeginningDate <= date('m/d/y') && $offer->publicationEndDate >= date('m/d/y')) : ?>
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
            <?php endif; endforeach; ?>
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
<? endif; ?>