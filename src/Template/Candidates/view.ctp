<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Candidate'), ['action' => 'edit', $candidate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Candidate'), ['action' => 'delete', $candidate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Candidates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Candidate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Offers'), ['controller' => 'Offers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Enterprises'), ['controller' => 'Enterprises', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="candidates view large-9 medium-8 columns content">
    <h3><?= h($candidate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('FirstName') ?></th>
            <td><?= h($candidate->FirstName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastName') ?></th>
            <td><?= h($candidate->LastName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($candidate->Address) ?></td>
        </tr>
    </table>
</div>
