<div class="users form">
<?= $this->Form->create($user); ?>
	<fieldset>
		<legend><?= __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('role');
		echo $this->Form->input('active');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('organization_id', ['options' => $organizations]);
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # %s?', $user->id)]); ?></li>
		<li><?= $this->Html->link(__('List Users'), ['action' => 'index']); ?></li>
		<li><?= $this->Html->link(__('List Organizations'), ['controller' => 'Organizations', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Organization'), ['controller' => 'Organizations', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']); ?> </li>
	</ul>
</div>
