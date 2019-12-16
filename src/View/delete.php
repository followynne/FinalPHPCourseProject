<?php $this->layout('layout', ['title' => 'Delete']) ?>

<a href="/"><input type="button" value="Go back to the Homepage"></a>
<a href="/login"><input type="button" value="Go back to the Adminpage"></a>

<div>
    <?php if($this->e($msg)) :?>
        <?= $this->e($msg)?>
    <?php endif ?>
</div>

