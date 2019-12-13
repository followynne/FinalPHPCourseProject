<?php $this->layout('layout', ['title' => 'HomePage']) ?>

<a href="/login"><input type="button" value="<?= $this->e($logbtn)?>"></a>
    <?php if($this->e($logbtn) == "Go to your Article Management") :?>
        <a href="/logout"><input type="button" value="Log Out"></a>
    <?php endif ?>

<h1>Home page</h1>
<ul>
<?php foreach($articles as $data): ?>
    <li>
        <a href="/article?seotitle=<?= $this->e($data['seotitle'])?>">
            <p><?= $this->e($data['title']) ?></p>
        </a>
        <p><?= $this->e($data['art_date']) ?></p>
        <p><?= substr($this->e($data['content']), 0, 100) ?> [...]</p>
    </li>
<?php endforeach ?>
</ul>