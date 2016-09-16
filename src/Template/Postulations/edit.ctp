<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $postulation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $postulation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Postulations'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="postulations form large-9 medium-8 columns content">
    <?= $this->Form->create($postulation) ?>
    <fieldset>
        <legend><?= __('Edit Postulation') ?></legend>
        <?php
            echo $this->Form->input('idCandidate');
            echo $this->Form->input('idOffer');
            echo $this->Form->input('DatePostulation');
            echo $this->Form->input('CV');
            echo $this->Form->input('PresentationLetter');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
