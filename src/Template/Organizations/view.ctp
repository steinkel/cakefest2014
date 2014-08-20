<div class="organizations view">
	<h2><?= __('Organization'); ?></h2>
	<dl>
		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($organization->id); ?>
			&nbsp;
		</dd>
		<dt><?= __('Name'); ?></dt>
		<dd>
			<?= h($organization->name); ?>
			&nbsp;
		</dd>
		<dt><?= __('Url'); ?></dt>
		<dd>
			<?= h($organization->url); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('Edit Organization'), ['action' => 'edit', $organization->id]); ?> </li>
		<li><?= $this->Form->postLink(__('Delete Organization'), ['action' => 'delete', $organization->id], ['confirm' => __('Are you sure you want to delete # %s?', $organization->id)]); ?> </li>
		<li><?= $this->Html->link(__('List Organizations'), ['action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Organization'), ['action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?= __('Related Users'); ?></h3>
	<?php if (!empty($organization->users)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id'); ?></th>
			<th><?= __('Email'); ?></th>
			<th><?= __('Password'); ?></th>
			<th><?= __('Role'); ?></th>
			<th><?= __('Active'); ?></th>
			<th><?= __('First Name'); ?></th>
			<th><?= __('Last Name'); ?></th>
			<th><?= __('Created'); ?></th>
			<th><?= __('Modified'); ?></th>
			<th><?= __('Organization Id'); ?></th>
			<th class="actions"><?= __('Actions'); ?></th>
		</tr>
		<?php foreach ($organization->users as $users): ?>
		<tr>
			<td><?= h($users->id) ?></td>
			<td><?= h($users->email) ?></td>
			<td><?= h($users->password) ?></td>
			<td><?= h($users->role) ?></td>
			<td><?= h($users->active) ?></td>
			<td><?= h($users->first_name) ?></td>
			<td><?= h($users->last_name) ?></td>
			<td><?= h($users->created) ?></td>
			<td><?= h($users->modified) ?></td>
			<td><?= h($users->organization_id) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]); ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]); ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # %s?', $users->id)]); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	<div class="actions">
		<ul>
			<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?> </li>
		</ul>
	</div>
</div>
