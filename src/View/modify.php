<?php $this->layout('layout', ['title' => 'Modify Article']) ?>

<a href="/userarticles"><input type="button" value="Go back to your articles"></a>
<a href="/login"><input type="button" value="Go back to the Admin Page"></a>
<a href="/"><input type="button" value="Go back to the Homepage"></a>




<h1>Modify Article</h1>
<h2>
    <?php if($this->e($msg)) :?>
        <?= $this->e($msg)?>
    <?php endif ?>
</h2>
<div>
    <form action="/modify?id=<?= $this->e($article['seotitle'])?>" method="POST" name="modify">
        <label for="title" >Title</label>
        <input type="text" style="width:500px;" id="title" name="title" value="<?= $this->e($article['title'])?>" required/><br/>
        <p>Seo Title: please use only letters, numbers and dash (-) to divide words</p>
            <input type="text" style="width:500px;" name="seotitle"
            pattern="[A-Za-z0-9\-]+" value="<?= $this->e($article['seotitle'])?>" required/><br/>
        <p></p>
        <label for="date">Article Date</label>
        <input type="date" id="date"name="articledate" value="<?= $this->e($article['art_date'])?>" required/><br/>
        <p></p>
        <label for="content">Your content</label>
        <textarea rows="20" cols="100" name="content" required><?= $this->e($article['content'])?></textarea>
        <p></p>
        <input type="submit" id="modifiedart" name="Modify"/>
        <p>Please note: save your work on a notepad before submitting.</br> If the seo title has already been used or 
        an error occurs while processing your data, this page will be refreshed and the data will be lost.</p>
        https://laracasts.com/discuss/channels/laravel/delete-method-with-href
    </form>
</div>