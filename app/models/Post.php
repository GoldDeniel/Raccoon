<?php

class Post extends Model
{
    protected $table = 'Posts';

    public function getAllPosts()
    {
        return $this->query("SELECT * FROM " . $this->table);
    }
}