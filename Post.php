<?php


class post
{
    private string $title = "";
    private string $date = "";
    private string $content = "";
    private string $author_name = "";

    public function __construct($title, $content, $author_name)
    {
        $this->title = $title;
        $this->date = Date('Y-m-d H:i:s');
        $this->content = $content;
        $this->author_name = $author_name;
    }

    public function __serialize(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'author_name' => $this->author_name,
        ];
    }

    public function __unserialize(array $data): void
    {
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
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
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