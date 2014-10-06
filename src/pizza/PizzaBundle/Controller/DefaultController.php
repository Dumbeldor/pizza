<?php

namespace pizza\PizzaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('pizzaPizzaBundle:Default:index.html.twig', array('name' => $name));
    }
}
