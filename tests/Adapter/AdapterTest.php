<?php

namespace Test\Adapter;

use Eezhal92\Adapter\Book;
use Eezhal92\Adapter\BookInterface;
use Eezhal92\Adapter\EBookAdapter;
use Eezhal92\Adapter\Kindle;

class AdapterTest extends \PHPUnit_Framework_TestCase
{
    public function getBook()
    {
        return [
            [new Book()],
            [new EBookAdapter(new Kindle())],
        ];
    }

    /**
     * @param BookInterface $book
     * @dataProvider getBook
     */
    public function test_i_am_old_client($book)
    {
        $this->assertTrue(method_exists($book, 'open'));
        $this->assertTrue(method_exists($book, 'turnPage'));
    }

    public function test_ebook_adapter()
    {
        $ebook = new EBookAdapter(new Kindle());
        $this->assertEquals($ebook->open(), 'turn the Eezhal92\Adapter\Kindle on');
    }
}
