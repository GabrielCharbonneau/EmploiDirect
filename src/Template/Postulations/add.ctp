<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Postulations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Offers'), ['controller' => 'Offers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Enterprises'), ['controller' => 'Enterprises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['controller' => 'Candidates', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="postulations form large-9 medium-8 columns content">
    <?= $this->Form->create($postulation, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Postulation') ?></legend>
        <?php   
            echo $this->Form->hidden('idCandidate', ['default' => '1']);
            echo $this->Form->hidden('idOffer', ['default' => '1']);
            echo $this->Form->hidden('DatePostulation', ['default' => 'now']);
            echo $this->Form->input('file', ['type' => 'file', 'class' => 'form-control']);
            echo $this->Form->input('PresentationLetter');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
