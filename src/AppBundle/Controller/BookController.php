<?php
namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends Controller
{
    /**
     * @Route("/book", name="book")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $books = $em->getRepository('AppBundle:Book')->findAll();

        return $this->render('default/getBooks.html.twig', array(
            'books' => $books,
        ));
    }

    /**
     * @Route("/bookInfo/{id}", name="bookInfo")
     */
    public function aboutAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $book = $em->getRepository('AppBundle:Book')->find($id);

        return $this->render(
            'default/bookInfo.html.twig',
            array(
                'book' => $book,
            )

        );
    }
}

