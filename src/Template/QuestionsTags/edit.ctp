<div class="questionsTags form">
<?= $this->Form->create($questionsTag); ?>
	<fieldset>
		<legend><?= __('Edit Questions Tag'); ?></legend>
	<?php
		echo $this->Form->input('question_id', ['options' => $questions]);
		echo $this->Form->input('tag_id', ['options' => $tags]);
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $questionsTag->question_id], ['confirm' => __('Are you sure you want to delete # %s?', $questionsTag->question_id)]); ?></li>
		<li><?= $this->Html->link(__('List Questions Tags'), ['action' => 'index']); ?></li>
		<li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']); ?> </li>
	</ul>
</div>
