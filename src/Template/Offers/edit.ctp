<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $offer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $offer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Offers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Enterprises'), ['controller' => 'Enterprises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Enterprise'), ['controller' => 'Enterprises', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="offers form large-9 medium-8 columns content">
    <?= $this->Form->create($offer) ?>
    <fieldset>
        <legend><?= __('Edit Offer') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('publicationBeginningDate');
            echo $this->Form->input('publicationEndDate');
            echo $this->Form->input('jobName');
            echo $this->Form->input('displayDate');
            echo $this->Form->input('responsabilitties');
            echo $this->Form->input('aptitudes');
            echo $this->Form->input('requirements');
            echo $this->Form->input('strengths');
            echo $this->Form->input('generalRemark');
            echo $this->Form->input('scholarity');
            echo $this->Form->input('sector');
            echo $this->Form->input('job');
            echo $this->Form->input('jobType');
            echo $this->Form->input('jobSituation');
            echo $this->Form->input('jobBeginningDate');
            echo $this->Form->input('enterprise_id', ['options' => $enterprises]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
