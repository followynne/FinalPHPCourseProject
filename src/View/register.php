<?php $this->layout('layout', ['title' => 'Registration Page']) ?>

<a href="/"><input type="button" value="Go back to the Homepage"></a>
<a href="/login"><input type="button" value="Go back to the Login"></a>

<h1>Register to the Matrix</h1>
<div>
    <form action="/register" method="POST" name="register">
        <p>Email</p><input type="email" name="mail"><br/>
        <p>Password</p><input type="password" name="pwd"><br/>
        <p>Re-type password</p><input type="password" name="pwd-check"><br/>
        <input type="submit" name="register">
    </form>
</div>
<div>
    <?php if($this->e($msg)) :?>
        <?= $this->e($msg)?>
    <?php endif ?>
</div>
