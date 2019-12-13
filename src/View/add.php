<?php $this->layout('layout', ['title' => 'AddNewArticle Page']) ?>

<a href="/"><input type="button" value="Go back to the Homepage"></a>
<a href="/login"><input type="button" value="Go back to the Adminpage"></a>

<h1>Add new article</h1>
<div>
    <form action="/add" method="POST" name="add">
        <p>title</p><input type="text" name="title"><br/>
        <p>seotitle</p><input type="text" name="seotitle"><br/>
        <p>articoldate</p><input type="date" name="articoldate"><br/>
        <p>text</p><input type="text" name="text"><br/>
        <input type="submit" name="Add" >
    </form>
    


