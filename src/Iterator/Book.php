<?php

namespace Eezhal92\Iterator;

class Book
{

    private $title;

    private $author;

    public function __construct($title, $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getAuthorAndTitle()
    {
        return "{$this->title} by {$this->author}";
    }
    
}