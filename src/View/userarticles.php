<?php $this->layout('layout', ['title' => 'HomePage']) ?>

<a href="/login"><input type="button" value="Go back"></a>
<a href="/"><input type="button" value="Go back to the Homepage"></a>

<h1>I tuoi articoli</h1>
<ul>
<?php foreach($articles as $data): ?>
    <li>
        <a href="/modify?id=<?= $this->e($data['seotitle'])?>">
            <p><?= $this->e($data['title']) ?></p>
        </a>
        <p><?= $this->e($data['art_date']) ?></p>
        <p><?= substr($this->e($data['content']), 0, 250) ?> [...]</p>
        <a href="/modify?id=<?= $this->e($data['seotitle'])?>"><input type="button" value="Modify"></a>
        <a href="/delete?id=<?= $this->e($data['seotitle'])?>"><input type="button" value="Delete"></a>
    </li>
<?php endforeach ?>
</ul>