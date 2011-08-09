<?php

namespace Knid\FoodalizrBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MealController extends Controller
{
    public function indexAction()
    {
        return $this->render('KnidFoodalizrBundle:Meal:index.html.twig');
    }
}
