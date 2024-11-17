<?php

class Post extends Model
{
    protected $table = 'Posts';

    public function getAllPosts()
    {
        $raw_posts = $this->query("SELECT * FROM " . $this->table);
        // convert author id to author username
        $posts = [];
        foreach ($raw_posts as $post) {
            $author = $this->query("SELECT username FROM Users WHERE id = :id", ['id' => $post->author]);
            $post->author = $author[0]->username;
            $posts[] = $post;
        }
        return $posts;
    }
    public function createPost($title, $content)
    {
        return $this->query("INSERT INTO " . $this->table . " (title, content, author) VALUES (:title, :content, :author)", ['title' => $title, 'content' => $content, 'author' => $_SESSION['user_id']]);
    }
}