<?php $this->layout('layout', ['title' => 'HomePage']) ?>

<a href="/login"><input type="button" value="Go back"></a>
<a href="/"><input type="button" value="Go back to the Homepage"></a>

<h1>Home page</h1>

<?php foreach($articles as $data): ?>
    <li>
        <a href="/modify?id=<?= $this->e($data['seotitle'])?>">
            <p><?= $this->e($data['title']) ?></p>
        </a>
        <p><?= $this->e($data['art_date']) ?></p>
        <p><?= $this->e($data['content']) ?></p>
    </li>
<?php endforeach ?>