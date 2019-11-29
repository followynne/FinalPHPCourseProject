<?php $this->layout('layout', ['title' => 'HomePage']) ?>

<a href="/login"><input type="button" value="<?= $this->e($logbtn)?>"></a>
<a href="/"><input type="button" value="Go back to the Homepage"></a>

<h1>Articolo Scelto:</h1>
<h2><?= $this->e($article['title']) ?></h2>
<div>
    <p><?= $this->e($article['art_date']) ?></p>
    <p><?= $this->e($article['content']) ?></p>
</div>