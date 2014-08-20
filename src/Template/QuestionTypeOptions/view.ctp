<div class="questionTypeOptions view">
	<h2><?= __('Question Type Option'); ?></h2>
	<dl>
		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($questionTypeOption->id); ?>
			&nbsp;
		</dd>
		<dt><?= __('Question Type'); ?></dt>
		<dd>
			<?= $questionTypeOption->has('question_type') ? $this->Html->link($questionTypeOption->question_type->name, ['controller' => 'QuestionTypes', 'action' => 'view', $questionTypeOption->question_type->id]) : ''; ?>
			&nbsp;
		</dd>
		<dt><?= __('Label'); ?></dt>
		<dd>
			<?= h($questionTypeOption->label); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('Edit Question Type Option'), ['action' => 'edit', $questionTypeOption->id]); ?> </li>
		<li><?= $this->Form->postLink(__('Delete Question Type Option'), ['action' => 'delete', $questionTypeOption->id], ['confirm' => __('Are you sure you want to delete # %s?', $questionTypeOption->id)]); ?> </li>
		<li><?= $this->Html->link(__('List Question Type Options'), ['action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question Type Option'), ['action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List QuestionTypes'), ['controller' => 'QuestionTypes', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question Type'), ['controller' => 'QuestionTypes', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?= __('Related Answers'); ?></h3>
	<?php if (!empty($questionTypeOption->answers)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id'); ?></th>
			<th><?= __('Question Id'); ?></th>
			<th><?= __('User Id'); ?></th>
			<th><?= __('Question Type Option Id'); ?></th>
			<th><?= __('Comment'); ?></th>
			<th class="actions"><?= __('Actions'); ?></th>
		</tr>
		<?php foreach ($questionTypeOption->answers as $answers): ?>
		<tr>
			<td><?= h($answers->id) ?></td>
			<td><?= h($answers->question_id) ?></td>
			<td><?= h($answers->user_id) ?></td>
			<td><?= h($answers->question_type_option_id) ?></td>
			<td><?= h($answers->comment) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Answers', 'action' => 'view', $answers->id]); ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Answers', 'action' => 'edit', $answers->id]); ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Answers', 'action' => 'delete', $answers->id], ['confirm' => __('Are you sure you want to delete # %s?', $answers->id)]); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']); ?> </li>
		</ul>
	</div>
</div>
