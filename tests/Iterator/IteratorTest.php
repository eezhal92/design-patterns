<?php

namespace Test\Iterator;

use Eezhal92\Iterator\Book;
use Eezhal92\Iterator\BookList;
use Eezhal92\Iterator\BookListIterator;
use Eezhal92\Iterator\BookListReverseIterator;

class IteratorTest extends \PHPUnit_Framework_TestCase
{
    private $bookList;

    public function setUp()
    {
        $this->bookList = new BookList();
        $this->bookList->addBook(new Book('Lorem', 'Ipsum'));
        $this->bookList->addBook(new Book('Sit', 'Amet'));
        $this->bookList->addBook(new Book('Dolor', 'Loo'));
    }

    public function expectedAuthors()
    {
        return [
            [
                ['Ipsum', 'Amet', 'Loo'],
            ],
        ];
    }

    /**
     * @dataProvider expectedAuthors
     */
    public function test_use_iterator_and_validate_author($expected)
    {
        $iterator = new BookListIterator($this->bookList);

        while ($iterator->valid()) {
            $expectedBook = array_shift($expected);
            $this->assertEquals($expectedBook, $iterator->current()->getAuthor());
            $iterator->next();
        }
    }

    /**
     * @dataProvider expectedAuthors
     */
    public function test_use_reverse_iterator_and_validate_author($expected)
    {
        $iterator = new BookListReverseIterator($this->bookList);

        while ($iterator->valid()) {
            $expectedBook = array_pop($expected);
            $this->assertEquals($expectedBook, $iterator->current()->getAuthor());
            $iterator->next();
        }
    }

    public function test_book_provide_correct_information()
    {
        $title = 'Learn TDD';
        $author = 'John Doe';

        $book = new Book($title, $author);

        $this->assertEquals($book->getTitle(), $title);
        $this->assertEquals($book->getAuthor(), $author);
        $this->assertEquals($book->getAuthorAndTitle(), "$title by $author");

        $newTitle = 'How to live';
        $book->setTitle($newTitle);
        $this->assertEquals($book->getTitle(), $newTitle);

        $newAuthor = 'Dale';
        $book->setAuthor($newAuthor);
        $this->assertEquals($book->getAuthor(), $newAuthor);

        $this->assertEquals($book->getAuthorAndTitle(), "$newTitle by $newAuthor");
    }

    public function test_add_and_remove_book_to_from_book_list()
    {
        $book = new Book('How to be a leader', 'John Doe');
        $bookList = new BookList();
        $bookList->addBook($book);

        $this->assertEquals($bookList->getBook(0), $book);

        $bookList->removeBook($book);

        $this->assertNull($bookList->getBook(0));
        $this->assertEquals($bookList->count(), 0);
    }
}
