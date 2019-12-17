<?php $this->layout('layout', ['title' => 'AdminPage']) ?>

<a href="/userarticles"><input type="button" value="Check your articles"></a>
<a href="/addarticle"><input type="button" value="Add new article"></a>
<a href="/"><input type="button" value="Go back to the Homepage"></a>
<a href="/logout"><input type="button" value="Log Out"></a>

<div>
    <?php if ($this->e($msg)) : ?>
        <?= $this->e($msg) ?>
    <?php endif ?>
</div>