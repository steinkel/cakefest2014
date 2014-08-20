<div class="users view">
	<h2><?= __('User'); ?></h2>
	<dl>
		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($user->id); ?>
			&nbsp;
		</dd>
		<dt><?= __('Email'); ?></dt>
		<dd>
			<?= h($user->email); ?>
			&nbsp;
		</dd>
		<dt><?= __('Password'); ?></dt>
		<dd>
			<?= h($user->password); ?>
			&nbsp;
		</dd>
		<dt><?= __('Role'); ?></dt>
		<dd>
			<?= h($user->role); ?>
			&nbsp;
		</dd>
		<dt><?= __('Active'); ?></dt>
		<dd>
			<?= h($user->active); ?>
			&nbsp;
		</dd>
		<dt><?= __('First Name'); ?></dt>
		<dd>
			<?= h($user->first_name); ?>
			&nbsp;
		</dd>
		<dt><?= __('Last Name'); ?></dt>
		<dd>
			<?= h($user->last_name); ?>
			&nbsp;
		</dd>
		<dt><?= __('Created'); ?></dt>
		<dd>
			<?= h($user->created); ?>
			&nbsp;
		</dd>
		<dt><?= __('Modified'); ?></dt>
		<dd>
			<?= h($user->modified); ?>
			&nbsp;
		</dd>
		<dt><?= __('Organization'); ?></dt>
		<dd>
			<?= $user->has('organization') ? $this->Html->link($user->organization->name, ['controller' => 'Organizations', 'action' => 'view', $user->organization->id]) : ''; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]); ?> </li>
		<li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # %s?', $user->id)]); ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New User'), ['action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?= __('Related Answers'); ?></h3>
	<?php if (!empty($user->answers)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id'); ?></th>
			<th><?= __('Question Id'); ?></th>
			<th><?= __('User Id'); ?></th>
			<th><?= __('Question Type Option Id'); ?></th>
			<th><?= __('Comment'); ?></th>
			<th class="actions"><?= __('Actions'); ?></th>
		</tr>
		<?php foreach ($user->answers as $answers): ?>
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
	<h3><?= __('Related Questions'); ?></h3>
	<?php if (!empty($user->questions)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id'); ?></th>
			<th><?= __('User Id'); ?></th>
			<th><?= __('Text'); ?></th>
			<th><?= __('Question Type Id'); ?></th>
			<th class="actions"><?= __('Actions'); ?></th>
		</tr>
		<?php foreach ($user->questions as $questions): ?>
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
