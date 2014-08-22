<?php $this->extend('/Layout/index'); ?>
<div class="answers index">
	<h2><?= __('Answers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?= $this->Paginator->sort('id'); ?></th>
		<th><?= $this->Paginator->sort('question_id'); ?></th>
		<th><?= $this->Paginator->sort('user_id'); ?></th>
		<th><?= $this->Paginator->sort('question_type_option_id'); ?></th>
		<th><?= $this->Paginator->sort('comment'); ?></th>
		<th class="actions"><?= __('Actions'); ?></th>
	</tr>
	<?php foreach ($answers as $answer): ?>
	<tr>
		<td><?= h($answer->id); ?>&nbsp;</td>
		<td>
			<?= $answer->has('question') ? $this->Html->link($answer->question->text, ['controller' => 'Questions', 'action' => 'view', $answer->question->id]) : ''; ?>
		</td>
		<td>
			<?= $answer->has('user') ? $this->Html->link($answer->user->email, ['controller' => 'Users', 'action' => 'view', $answer->user->id]) : ''; ?>
		</td>
		<td>
			<?= $answer->has('question_type_option') ? $this->Html->link($answer->question_type_option->id, ['controller' => 'QuestionTypeOptions', 'action' => 'view', $answer->question_type_option->id]) : ''; ?>
		</td>
		<td><?= h($answer->comment); ?>&nbsp;</td>
		<td class="actions">
			<?= $this->Html->link(__('View'), ['action' => 'view', $answer->id]); ?>
			<?= $this->Html->link(__('Edit'), ['action' => 'edit', $answer->id]); ?>
			<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $answer->id], ['confirm' => __('Are you sure you want to delete # %s?', $answer->id)]); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
	<p><?= $this->Paginator->counter(); ?></p>
	<ul class="pagination">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'));
		echo $this->Paginator->numbers();
		echo $this->Paginator->next(__('next') . ' >');
	?>
	</ul>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('New Answer'), ['action' => 'add']); ?></li>
		<li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List QuestionTypeOptions'), ['controller' => 'QuestionTypeOptions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question Type Option'), ['controller' => 'QuestionTypeOptions', 'action' => 'add']); ?> </li>
	</ul>
</div>
