<?php $this->extend('/Layout/index'); ?>
<div class="questionTypes index">
	<h2><?= __('Question Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?= $this->Paginator->sort('id'); ?></th>
		<th><?= $this->Paginator->sort('name'); ?></th>
		<th><?= $this->Paginator->sort('description'); ?></th>
		<th class="actions"><?= __('Actions'); ?></th>
	</tr>
	<?php foreach ($questionTypes as $questionType): ?>
	<tr>
		<td><?= h($questionType->id); ?>&nbsp;</td>
		<td><?= h($questionType->name); ?>&nbsp;</td>
		<td><?= h($questionType->description); ?>&nbsp;</td>
		<td class="actions">
			<?= $this->Html->link(__('View'), ['action' => 'view', $questionType->id]); ?>
			<?= $this->Html->link(__('Edit'), ['action' => 'edit', $questionType->id]); ?>
			<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $questionType->id], ['confirm' => __('Are you sure you want to delete # %s?', $questionType->id)]); ?>
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
		<li><?= $this->Html->link(__('New Question Type'), ['action' => 'add']); ?></li>
		<li><?= $this->Html->link(__('List QuestionTypeOptions'), ['controller' => 'QuestionTypeOptions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question Type Option'), ['controller' => 'QuestionTypeOptions', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']); ?> </li>
	</ul>
</div>
