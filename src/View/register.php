<?php $this->layout('layout', ['title' => 'Registration Page']) ?>

<h1>Login</h1>
<div>
    <form action="/register" method="POST" name="register">
        <p>email</p><input type="email" name="user"><br/>
        <p>password</p><input type="password" name="pwd"><br/>
        <p>re-type password</p><input type="password" name="pwd-check"><br/>
        <input type="submit" name="register">
    </form>
</div>
