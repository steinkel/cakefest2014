<div class="questions form">
<?= $this->Form->create($question); ?>
	<fieldset>
		<legend><?= __('Add Question'); ?></legend>
	<?php
		echo $this->Form->input('user_id', ['options' => $users]);
		echo $this->Form->input('text');
		echo $this->Form->input('question_type_id', ['options' => $questionTypes]);
		echo $this->Form->input('tags._ids', ['options' => $tags]);
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('List Questions'), ['_name' => 'Questions::index']); ?></li>
		<li><?= $this->Html->link(__('List Users'), ['_name' => 'Users::index']); ?> </li>
		<li><?= $this->Html->link(__('New User'), ['_name' => 'Users::add']); ?> </li>
	</ul>
</div>
