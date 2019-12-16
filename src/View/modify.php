<?php $this->layout('layout', ['title' => 'Modify Article']) ?>

<a href="/"><input type="button" value="Go back to the Homepage"></a>
<a href="/login"><input type="button" value="Go back to the Adminpage"></a>




<h1>Modify Article</h1>
<div>
    <form action="/modarticle" method="POST" name="modify">
        <p>Title</p><input type="text" style="width:500px;" name="title" required/><br/>
        <p>Seo Title: please use only letters, numbers and dash (-) to divide words</p>
            <input type="text" style="width:500px;" name="seotitle" pattern="[A-Za-z0-9\-]+" required/><br/>
        <p>Article Date</p><input type="date" name="articledate" required/><br/>
        <p>Text</p><textarea rows="20" cols="100" name="content" required></textarea>
        <p></p>
        <input type="submit" id="modifiedart" name="Modify"/>
        <p>Please note: save your work on a notepad before submitting.</br> If the seo title has already been used or 
        an error occurs while processing your data, this page will be refreshed and the data will be lost.</p>
    </form>
</div>
<div>
    <?php if($this->e($msg)) :?>
        <?= $this->e($msg)?>
    <?php endif ?>
</div>