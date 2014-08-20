<div class="answers form">
<?= $this->Form->create($answer); ?>
	<fieldset>
		<legend><?= __('Add Answer'); ?></legend>
	<?php
		echo $this->Form->input('question_id', ['options' => $questions]);
		echo $this->Form->input('user_id', ['options' => $users]);
		echo $this->Form->input('question_type_option_id', ['options' => $questionTypeOptions]);
		echo $this->Form->input('comment');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('List Answers'), ['action' => 'index']); ?></li>
		<li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List QuestionTypeOptions'), ['controller' => 'QuestionTypeOptions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question Type Option'), ['controller' => 'QuestionTypeOptions', 'action' => 'add']); ?> </li>
	</ul>
</div>
