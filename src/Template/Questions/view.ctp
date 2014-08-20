<div class="questions view">
	<h2><?= __('Question'); ?></h2>
	<dl>
		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($question->id); ?>
			&nbsp;
		</dd>
		<dt><?= __('User'); ?></dt>
		<dd>
			<?= $question->has('user') ? $this->Html->link($question->user->email, ['controller' => 'Users', 'action' => 'view', $question->user->id]) : ''; ?>
			&nbsp;
		</dd>
		<dt><?= __('Text'); ?></dt>
		<dd>
			<?= h($question->text); ?>
			&nbsp;
		</dd>
		<dt><?= __('Question Type'); ?></dt>
		<dd>
			<?= $question->has('question_type') ? $this->Html->link($question->question_type->name, ['controller' => 'QuestionTypes', 'action' => 'view', $question->question_type->id]) : ''; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('Edit Question'), ['action' => 'edit', $question->id]); ?> </li>
		<li><?= $this->Form->postLink(__('Delete Question'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # %s?', $question->id)]); ?> </li>
		<li><?= $this->Html->link(__('List Questions'), ['action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question'), ['action' => 'add']); ?> </li>
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
<div class="related">
	<h3><?= __('Related Answers'); ?></h3>
	<?php if (!empty($question->answers)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id'); ?></th>
			<th><?= __('Question Id'); ?></th>
			<th><?= __('User Id'); ?></th>
			<th><?= __('Question Type Option Id'); ?></th>
			<th><?= __('Comment'); ?></th>
			<th class="actions"><?= __('Actions'); ?></th>
		</tr>
		<?php foreach ($question->answers as $answers): ?>
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
<div class="related">
	<h3><?= __('Related Tags'); ?></h3>
	<?php if (!empty($question->tags)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id'); ?></th>
			<th><?= __('Name'); ?></th>
			<th class="actions"><?= __('Actions'); ?></th>
		</tr>
		<?php foreach ($question->tags as $tags): ?>
		<tr>
			<td><?= h($tags->id) ?></td>
			<td><?= h($tags->name) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Tags', 'action' => 'view', $tags->id]); ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Tags', 'action' => 'edit', $tags->id]); ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Tags', 'action' => 'delete', $tags->id], ['confirm' => __('Are you sure you want to delete # %s?', $tags->id)]); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']); ?> </li>
		</ul>
	</div>
</div>
