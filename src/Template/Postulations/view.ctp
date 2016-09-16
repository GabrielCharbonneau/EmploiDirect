<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Postulation'), ['action' => 'edit', $postulation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Postulation'), ['action' => 'delete', $postulation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $postulation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Postulations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Postulation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offers'), ['controller' => 'Offers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Enterprises'), ['controller' => 'Enterprises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="postulations view large-9 medium-8 columns content">
    <h3><?= h($postulation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('CV') ?></th>
            <td><?= h($postulation->CV) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PresentationLetter') ?></th>
            <td><?= h($postulation->PresentationLetter) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($postulation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdCandidate') ?></th>
            <td><?= $this->Number->format($postulation->idCandidate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdOffer') ?></th>
            <td><?= $this->Number->format($postulation->idOffer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DatePostulation') ?></th>
            <td><?= h($postulation->DatePostulation) ?></td>
        </tr>
    </table>
</div>
