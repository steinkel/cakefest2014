<div class="questionsTags view">
	<h2><?= __('Questions Tag'); ?></h2>
	<dl>
		<dt><?= __('Question'); ?></dt>
		<dd>
			<?= $questionsTag->has('question') ? $this->Html->link($questionsTag->question->text, ['controller' => 'Questions', 'action' => 'view', $questionsTag->question->id]) : ''; ?>
			&nbsp;
		</dd>
		<dt><?= __('Tag'); ?></dt>
		<dd>
			<?= $questionsTag->has('tag') ? $this->Html->link($questionsTag->tag->name, ['controller' => 'Tags', 'action' => 'view', $questionsTag->tag->id]) : ''; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('Edit Questions Tag'), ['action' => 'edit', $questionsTag->question_id]); ?> </li>
		<li><?= $this->Form->postLink(__('Delete Questions Tag'), ['action' => 'delete', $questionsTag->question_id], ['confirm' => __('Are you sure you want to delete # %s?', $questionsTag->question_id)]); ?> </li>
		<li><?= $this->Html->link(__('List Questions Tags'), ['action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Questions Tag'), ['action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']); ?> </li>
	</ul>
</div>
