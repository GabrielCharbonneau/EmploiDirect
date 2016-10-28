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
        ?>
        <b><?=__('Presentation letter model') ?></b>
        <select id="dropdown">
                <option value=""><?=__('No model')?></option>
                <option value="model1"><?=__('Model 1')?></option>
                <option value="model2"><?=__('Model 2')?></option>
            </select>
        <?php
            echo $this->Form->input('PresentationLetter', ['type' => 'textarea']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
    var mydropdown = document.getElementById('dropdown');
    
    mydropdown.onchange = function(){
        if(mydropdown.value === "model1"){
            $.ajax({
                url : "/EmploiDirect/LettrePresentation01DiplomeDeCollege.txt",
                dataType: "text",
                success : function (data) {
                    $("#presentationletter").text(data);
                }
            });
        } else if(mydropdown.value === "model2"){
            $.ajax({
                url : "/EmploiDirect/LettrePresentation02ExperienceProfessionnelle.txt",
                dataType: "text",
                success : function (data) {
                    $("#presentationletter").text(data);
                }
            });
        } else {
            $("#presentationletter").text('');
        }
    }
</script>