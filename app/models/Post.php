<?php

class Post extends Model
{
    protected $table = 'Posts';

    public function getAllPosts()
    {
        return $this->query("SELECT * FROM " . $this->table);
    }
    public function createPost($title, $content)
    {
        return $this->query("INSERT INTO " . $this->table . " (title, content, author) VALUES (:title, :content, :author)", ['title' => $title, 'content' => $content, 'author' => $_SESSION['user_id']]);
    }
}