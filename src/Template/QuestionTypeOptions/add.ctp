<div class="questionTypeOptions form">
<?= $this->Form->create($questionTypeOption); ?>
	<fieldset>
		<legend><?= __('Add Question Type Option'); ?></legend>
	<?php
		echo $this->Form->input('question_type_id', ['options' => $questionTypes]);
		echo $this->Form->input('label');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('List Question Type Options'), ['action' => 'index']); ?></li>
		<li><?= $this->Html->link(__('List QuestionTypes'), ['controller' => 'QuestionTypes', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question Type'), ['controller' => 'QuestionTypes', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']); ?> </li>
	</ul>
</div>
