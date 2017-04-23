<?php
/**
 * Created by PhpStorm.
 * User: jiansu
 * Date: 4/22/17
 * Time: 5:07 PM
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function homepageAction()
    {
        return $this->render('main/homepage.html.twig');
    }
}