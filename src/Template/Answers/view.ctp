<div class="answers view">
	<h2><?= __('Answer'); ?></h2>
	<dl>
		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($answer->id); ?>
			&nbsp;
		</dd>
		<dt><?= __('Question'); ?></dt>
		<dd>
			<?= $answer->has('question') ? $this->Html->link($answer->question->text, ['controller' => 'Questions', 'action' => 'view', $answer->question->id]) : ''; ?>
			&nbsp;
		</dd>
		<dt><?= __('User'); ?></dt>
		<dd>
			<?= $answer->has('user') ? $this->Html->link($answer->user->email, ['controller' => 'Users', 'action' => 'view', $answer->user->id]) : ''; ?>
			&nbsp;
		</dd>
		<dt><?= __('Question Type Option'); ?></dt>
		<dd>
			<?= $answer->has('question_type_option') ? $this->Html->link($answer->question_type_option->id, ['controller' => 'QuestionTypeOptions', 'action' => 'view', $answer->question_type_option->id]) : ''; ?>
			&nbsp;
		</dd>
		<dt><?= __('Comment'); ?></dt>
		<dd>
			<?= $this->Text->autolink($answer->comment); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('Edit Answer'), ['action' => 'edit', $answer->id]); ?> </li>
		<li><?= $this->Form->postLink(__('Delete Answer'), ['action' => 'delete', $answer->id], ['confirm' => __('Are you sure you want to delete # %s?', $answer->id)]); ?> </li>
		<li><?= $this->Html->link(__('List Answers'), ['action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Answer'), ['action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?> </li>
		<li><?= $this->Html->link(__('List QuestionTypeOptions'), ['controller' => 'QuestionTypeOptions', 'action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New Question Type Option'), ['controller' => 'QuestionTypeOptions', 'action' => 'add']); ?> </li>
	</ul>
</div>
