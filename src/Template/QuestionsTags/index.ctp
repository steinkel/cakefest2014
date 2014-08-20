<div class="questionsTags index">
	<h2><?= __('Questions Tags'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?= $this->Paginator->sort('question_id'); ?></th>
		<th><?= $this->Paginator->sort('tag_id'); ?></th>
		<th class="actions"><?= __('Actions'); ?></th>
	</tr>
	<?php foreach ($questionsTags as $questionsTag): ?>
	<tr>
		<td>
			<?= $questionsTag->has('question') ? $this->Html->link($questionsTag->question->text, ['controller' => 'Questions', 'action' => 'view', $questionsTag->question->id]) : ''; ?>
		</td>
		<td>
			<?= $questionsTag->has('tag') ? $this->Html->link($questionsTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $questionsTag->tag->id]) : ''; ?>
		</td>
		<td class="actions">
			<?= $this->Html->link(__('View'), ['action' => 'view', $questionsTag->question_id]); ?>
			<?= $this->Html->link(__('Edit'), ['action' => 'edit', $questionsTag->question_id]); ?>
			<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $questionsTag->question_id], ['confirm' => __('Are you sure you want to delete # %s?', $questionsTag->question_id)]); ?>
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
		<li><?= $this->Html->link(__('New Questions Tag'), ['action' => 'add']); ?></li>
		<li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']); ?> </li>
	</ul>
</div>
