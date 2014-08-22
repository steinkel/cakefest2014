<div>
<h2>Top Users This Week</h2>
<ul>
<?php foreach ($topUsers as $user) : ?>
<li><?= $user->full_name; ?> : <?= $user->total_answers; ?></li>
<?php endforeach; ?>
</ul>
</div>
