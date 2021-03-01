<?php


class post
{
    private string $datePost = "";
    private string $title = "";
    private string $content = "";
    private string $author_name = "";

    public function __construct($title, $content, $author_name)
    {
        $this->datePost = date('l jS \of F Y h:i A');
        $this->title = $title;
        $this->content = $content;
        $this->author_name = $author_name;
    }

    public function __serialize(): array
    {
        return [
            //'date' => $this->datePost,
            'title' => $this->title,
            'content' => $this->content,
            'author_name' => $this->author_name,
        ];
    }

    public function __unserialize(array $data): void
    {
        //$this->datePost = $data['date'];
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->author_name = $data['author_name'];

    }




    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return false|string
     */
    public function getDatePost(): bool|string
    {
        return $this->datePost;
    }

    /**
     * @param false|string $datePost
     */
    public function setDatePost(bool|string $datePost): void
    {
        $this->datePost = $datePost;
    }


    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getAuthorName(): string
    {
        return $this->author_name;
    }

    /**
     * @param string $author_name
     */
    public function setAuthorName(string $author_name): void
    {
        $this->author_name = $author_name;
    }


}