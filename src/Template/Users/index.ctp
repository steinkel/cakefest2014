<div class="users index">
	<h2><?= __('Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?= $this->Paginator->sort('id'); ?></th>
		<th><?= $this->Paginator->sort('email'); ?></th>
		<th><?= $this->Paginator->sort('password'); ?></th>
		<th><?= $this->Paginator->sort('role'); ?></th>
		<th><?= $this->Paginator->sort('active'); ?></th>
		<th><?= $this->Paginator->sort('first_name'); ?></th>
		<th><?= $this->Paginator->sort('last_name'); ?></th>
		<th><?= $this->Paginator->sort('created'); ?></th>
		<th><?= $this->Paginator->sort('modified'); ?></th>
		<th><?= $this->Paginator->sort('organization_id'); ?></th>
		<th class="actions"><?= __('Actions'); ?></th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?= h($user->id); ?>&nbsp;</td>
		<td><?= h($user->email); ?>&nbsp;</td>
		<td><?= h($user->password); ?>&nbsp;</td>
		<td><?= h($user->role); ?>&nbsp;</td>
		<td><?= h($user->active); ?>&nbsp;</td>
		<td><?= h($user->first_name); ?>&nbsp;</td>
		<td><?= h($user->last_name); ?>&nbsp;</td>
		<td><?= h($user->created); ?>&nbsp;</td>
		<td><?= h($user->modified); ?>&nbsp;</td>
		<td>
			<?= $user->has('organization') ? $this->Html->link($user->organization->name, ['controller' => 'Organizations', 'action' => 'view', $user->organization->id]) : ''; ?>
		</td>
		<td class="actions">
			<?= $this->Html->link(__('View'), ['action' => 'view', $user->id]); ?>
			<?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]); ?>
			<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # %s?', $user->id)]); ?>
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
		<li><?= $this->Html->link(__('New User'), ['action' => 'add']); ?></li>
		<li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']); ?> </li>
	</ul>
</div>
