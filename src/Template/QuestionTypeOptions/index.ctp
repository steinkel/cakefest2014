<div class="questionTypeOptions index">
	<h2><?= __('Question Type Options'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?= $this->Paginator->sort('id'); ?></th>
		<th><?= $this->Paginator->sort('question_type_id'); ?></th>
		<th><?= $this->Paginator->sort('label'); ?></th>
		<th class="actions"><?= __('Actions'); ?></th>
	</tr>
	<?php foreach ($questionTypeOptions as $questionTypeOption): ?>
	<tr>
		<td><?= h($questionTypeOption->id); ?>&nbsp;</td>
		<td>
			<?= $questionTypeOption->has('question_type') ? $this->Html->link($questionTypeOption->question_type->name, ['controller' => 'QuestionTypes', 'action' => 'view', $questionTypeOption->question_type->id]) : ''; ?>
		</td>
		<td><?= h($questionTypeOption->label); ?>&nbsp;</td>
		<td class="actions">
			<?= $this->Html->link(__('View'), ['action' => 'view', $questionTypeOption->id]); ?>
			<?= $this->Html->link(__('Edit'), ['action' => 'edit', $questionTypeOption->id]); ?>
			<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $questionTypeOption->id], ['confirm' => __('Are you sure you want to delete # %s?', $questionTypeOption->id)]); ?>
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
		<li><?= $this->Html->link(__('New Question Type Option'), ['action' => 'add']); ?></li>
		<li><?= $this->Html->link(__('List QuestionTypes'), ['controller' => 'QuestionTypes', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question Type'), ['controller' => 'QuestionTypes', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']); ?> </li>
	</ul>
</div>
