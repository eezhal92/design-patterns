<?php

namespace Eezhal92\Iterator;

use Countable;

class BookList implements Countable
{
    private $books = [];

    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    public function getBook($bookNumberToGet)
    {
        if (isset($this->books[$bookNumberToGet])) {
            return $this->books[$bookNumberToGet];
        }
    }

    public function removeBook(Book $bookToRemove)
    {
        foreach ($this->books as $key => $book) {
            if ($book->getAuthorAndTitle() == $bookToRemove->getAuthorAndTitle()) {
                unset($this->books[$key]);
            }
        }
    }

    public function count()
    {
        return count($this->books);
    }
}
