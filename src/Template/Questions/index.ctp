<div class="questions index">
	<h2><?= __('Questions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?= $this->Paginator->sort('id'); ?></th>
		<th><?= $this->Paginator->sort('user_id'); ?></th>
		<th><?= $this->Paginator->sort('text'); ?></th>
		<th><?= $this->Paginator->sort('question_type_id'); ?></th>
		<th class="actions"><?= __('Actions'); ?></th>
	</tr>
	<?php foreach ($questions as $question): ?>
	<tr>
		<td><?= h($question->id); ?>&nbsp;</td>
		<td>
			<?= $question->has('user') ? $this->Html->link($question->user->email, ['controller' => 'Users', 'action' => 'view', $question->user->id]) : ''; ?>
		</td>
		<td><?= h($question->text); ?>&nbsp;</td>
		<td>
			<?= $question->has('question_type') ? $this->Html->link($question->question_type->name, ['controller' => 'QuestionTypes', 'action' => 'view', $question->question_type->id]) : ''; ?>
		</td>
		<td class="actions">
			<?= $this->Html->link(__('View'), ['action' => 'view', $question->id]); ?>
			<?= $this->Html->link(__('Edit'), ['action' => 'edit', $question->id]); ?>
			<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # %s?', $question->id)]); ?>
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
		<li><?= $this->Html->link(__('New Question'), ['action' => 'add']); ?></li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List QuestionTypes'), ['controller' => 'QuestionTypes', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question Type'), ['controller' => 'QuestionTypes', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']); ?> </li>
	</ul>
</div>
