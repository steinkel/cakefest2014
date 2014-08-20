<div class="questionTypes view">
	<h2><?= __('Question Type'); ?></h2>
	<dl>
		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($questionType->id); ?>
			&nbsp;
		</dd>
		<dt><?= __('Name'); ?></dt>
		<dd>
			<?= h($questionType->name); ?>
			&nbsp;
		</dd>
		<dt><?= __('Description'); ?></dt>
		<dd>
			<?= h($questionType->description); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('Edit Question Type'), ['action' => 'edit', $questionType->id]); ?> </li>
		<li><?= $this->Form->postLink(__('Delete Question Type'), ['action' => 'delete', $questionType->id], ['confirm' => __('Are you sure you want to delete # %s?', $questionType->id)]); ?> </li>
		<li><?= $this->Html->link(__('List Question Types'), ['action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question Type'), ['action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List QuestionTypeOptions'), ['controller' => 'QuestionTypeOptions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question Type Option'), ['controller' => 'QuestionTypeOptions', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?= __('Related QuestionTypeOptions'); ?></h3>
	<?php if (!empty($questionType->question_type_options)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id'); ?></th>
			<th><?= __('Question Type Id'); ?></th>
			<th><?= __('Label'); ?></th>
			<th class="actions"><?= __('Actions'); ?></th>
		</tr>
		<?php foreach ($questionType->question_type_options as $questionTypeOptions): ?>
		<tr>
			<td><?= h($questionTypeOptions->id) ?></td>
			<td><?= h($questionTypeOptions->question_type_id) ?></td>
			<td><?= h($questionTypeOptions->label) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'QuestionTypeOptions', 'action' => 'view', $questionTypeOptions->id]); ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'QuestionTypeOptions', 'action' => 'edit', $questionTypeOptions->id]); ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'QuestionTypeOptions', 'action' => 'delete', $questionTypeOptions->id], ['confirm' => __('Are you sure you want to delete # %s?', $questionTypeOptions->id)]); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?= $this->Html->link(__('New Question Type Option'), ['controller' => 'QuestionTypeOptions', 'action' => 'add']); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?= __('Related Questions'); ?></h3>
	<?php if (!empty($questionType->questions)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id'); ?></th>
			<th><?= __('User Id'); ?></th>
			<th><?= __('Text'); ?></th>
			<th><?= __('Question Type Id'); ?></th>
			<th class="actions"><?= __('Actions'); ?></th>
		</tr>
		<?php foreach ($questionType->questions as $questions): ?>
		<tr>
			<td><?= h($questions->id) ?></td>
			<td><?= h($questions->user_id) ?></td>
			<td><?= h($questions->text) ?></td>
			<td><?= h($questions->question_type_id) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Questions', 'action' => 'view', $questions->id]); ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Questions', 'action' => 'edit', $questions->id]); ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Questions', 'action' => 'delete', $questions->id], ['confirm' => __('Are you sure you want to delete # %s?', $questions->id)]); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']); ?> </li>
		</ul>
	</div>
</div>
