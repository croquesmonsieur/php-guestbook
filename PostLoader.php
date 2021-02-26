<?php

class PostLoader
{
    private array $user_posts = [];
    public const MAX_POSTS = 20;
    private const DATA_FILE = "guestbook.txt";

    public function __construct()
    {
        if (file_get_contents(self::DATA_FILE)) {
            $this->user_posts = unserialize(file_get_contents(self::DATA_FILE));
        }
    }

    /**
     * @return array|mixed
     */
    public function getUserPosts(): mixed
    {
        //var_dump($this->user_posts);
        return $this->user_posts;
    }


    public function addPost(Post $post): void
    {
        $this->user_posts[] = $post;
        file_put_contents(self::DATA_FILE, serialize($this->user_posts));
    }

    public function readPosts(): ?array
    {
        return $this->user_posts = unserialize(file_get_contents(self::DATA_FILE));

    }


}