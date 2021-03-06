<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Created by PhpStorm.
 * User: yannickmaelraoumbe
 * Date: 2019-01-08
 * Time: 15:22
 *
 * @Route("/books")
 */
class BookController extends Controller
{
    /**
     * @Template
     *
     * @Route("/", name="book_list")
     */
    public  function listOfBooks() {
        return ['bite' => 'ccc'];
    }

    /**
     * @Template
     *
     * @Route("/{id}", name ="get_one_book")
     */
     public function getOneBook(Book $book){
        return ['book' => $book];
     }

    /**
     * @Template
     *
     * @Route("/search", name="search_one_book")
     */
    public function search(Book $book){
        return ['book' => $book];
    }


    /**
     * @Route("/{id}/annonces", name = "annonces_by_book")
     *
     * @Template
     *
     * @param Book $book
     *
     * @return array
     */
    public function annonces(Book $book)
    {
       $annonces = $book->getAnnonces();

       return ['annonces' => $annonces];
    }
}
