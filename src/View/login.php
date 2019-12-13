<?php $this->layout('layout', ['title' => 'Login Page']) ?>

<a href="/"><input type="button" value="Go back to the Homepage"></a>

<h1>Login</h1>
<div>
    <form action="/login" method="POST" name="login">
        <p>email</p><input type="email" name="mail"><br/>
        <p>password</p><input type="password" name="pwd"><br/>
        <input type="submit" name="login" >
    </form>
    <div>Se non sei registrato, <a href="/register">clicca qui per farlo</a></div>
    <div></div>
</div>
<div>
    <?php if($this->e($msg)) :?>
        <?= $this->e($msg)?>
    <?php endif ?>
</div>
