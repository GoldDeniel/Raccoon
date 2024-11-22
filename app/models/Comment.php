<?php
    
    class Comment extends Model {
        protected $table = "Messages";

        public function getAllComments()
        {
            $raw_comments = $this->query("SELECT * FROM " . $this->table);
            // convert author id to author username
            $comments = [];
            foreach ($raw_comments as $comment) {
                if ($comment->author != -1) {
                    $author = $this->query("SELECT username FROM Users WHERE id = :id", ['id' => $comment->author]);
                    $comment->author = $author[0]->username;
                } else {
                    $comment->author = "Not logged in user";
                }
                $comments[] = $comment;
            }
        return $comments;
        }

        public function createComment($text, $email, $mobile, $author )
        {
            return $this->query("INSERT INTO " . $this->table . " (text, email, mobile, author) VALUES (:text, :email, :mobile, :author)", ['text' => $text, 'email' => $email, 'mobile' => $mobile, 'author' => $author]);
        }
    }