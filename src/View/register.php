<?php $this->layout('layout', ['title' => 'Registration Page']) ?>

<h1>Login</h1>
<div>
    <form action="/register" method="POST" name="register">
        <input type="email" name="user"><br/>
        <input type="password" name="pwd"><br/>
        <input type="password" name="pwd"><br/>
        <input type="submit" name="register">
    </form>
</div>
