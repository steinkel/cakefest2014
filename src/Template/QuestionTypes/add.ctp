<div class="questionTypes form">
<?= $this->Form->create($questionType); ?>
	<fieldset>
		<legend><?= __('Add Question Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('List Question Types'), ['action' => 'index']); ?></li>
		<li><?= $this->Html->link(__('List QuestionTypeOptions'), ['controller' => 'QuestionTypeOptions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question Type Option'), ['controller' => 'QuestionTypeOptions', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']); ?> </li>
	</ul>
</div>
