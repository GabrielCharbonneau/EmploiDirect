<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Offer'), ['action' => 'edit', $offer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Offer'), ['action' => 'delete', $offer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Offers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Offer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offers'), ['controller' => 'Offers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Enterprises'), ['controller' => 'Enterprises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($offer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($offer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($offer->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('JobName') ?></th>
            <td><?= h($offer->jobName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Responsabilitties') ?></th>
            <td><?= h($offer->responsabilitties) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aptitudes') ?></th>
            <td><?= h($offer->aptitudes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Requirements') ?></th>
            <td><?= h($offer->requirements) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Strengths') ?></th>
            <td><?= h($offer->strengths) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('GeneralRemark') ?></th>
            <td><?= h($offer->generalRemark) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Scholarity') ?></th>
            <td><?= h($offer->scholarity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sector') ?></th>
            <td><?= h($offer->sector) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job') ?></th>
            <td><?= h($offer->job) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('JobType') ?></th>
            <td><?= h($offer->jobType) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('JobSituation') ?></th>
            <td><?= h($offer->jobSituation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enterprise') ?></th>
            <td><?= $offer->has('enterprise') ? $this->Html->link($offer->enterprise->name, ['controller' => 'Enterprises', 'action' => 'view', $offer->enterprise->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($offer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PublicationBeginningDate') ?></th>
            <td><?= h($offer->publicationBeginningDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PublicationEndDate') ?></th>
            <td><?= h($offer->publicationEndDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DisplayDate') ?></th>
            <td><?= h($offer->displayDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('JobBeginningDate') ?></th>
            <td><?= h($offer->jobBeginningDate) ?></td>
        </tr>
    </table>
    <?= $this->Form->create($offer) ?>
    <?= $this->Form->button(__('Activate')) ?>
    <?= $this->Form->end() ?>
</div>
