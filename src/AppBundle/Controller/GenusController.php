<?php
/**
 * Created by PhpStorm.
 * User: jiansu
 * Date: 4/21/17
 * Time: 7:36 PM
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;



class GenusController extends Controller
{
    /**
     * @Route("/genus/{name}")
     */
    public function showAction($name)
    {
        $notes = [
            'Octpus asked me a riddle',
            'I counted 8 legs',
            'Inked!'
        ];
        return $this->render('genus/show.html.twig', compact('name', 'notes'));
    }

    /**
     * @Route("/genus/{genusName}/notes", name="genus_show_notes")
     * @Method("GET")
     */
    public function getNotesAction()
    {
        $notes = [
          ['id' => 1, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'Octopus asked me a riddle', 'date' => 'Aug. 20, 2015'],
          ['id' => 2, 'username' => 'AquaWeaver', 'avatarUri' => '/images/ryan.jpeg', 'I counted 8 legs... as', 'date' => 'Aug. 20, 2015'],
          ['id' => 3, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'Inked,', 'date' => 'Aug. 20, 2015'],
        ];

        $data = [
            'notes' => $notes
        ];

        return new JsonResponse($data);
    }
}