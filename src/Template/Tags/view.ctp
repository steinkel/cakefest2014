<div class="tags view">
	<h2><?= __('Tag'); ?></h2>
	<dl>
		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($tag->id); ?>
			&nbsp;
		</dd>
		<dt><?= __('Name'); ?></dt>
		<dd>
			<?= h($tag->name); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id]); ?> </li>
		<li><?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # %s?', $tag->id)]); ?> </li>
		<li><?= $this->Html->link(__('List Tags'), ['action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Tag'), ['action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?= __('Related Questions'); ?></h3>
	<?php if (!empty($tag->questions)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id'); ?></th>
			<th><?= __('User Id'); ?></th>
			<th><?= __('Text'); ?></th>
			<th><?= __('Question Type Id'); ?></th>
			<th class="actions"><?= __('Actions'); ?></th>
		</tr>
		<?php foreach ($tag->questions as $questions): ?>
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
