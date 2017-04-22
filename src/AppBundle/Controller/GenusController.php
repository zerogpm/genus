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
        $funFact = 'Octopuses can change the color of their body in just *three-tenths* of a second!';

        $cache = $this->get('doctrine_cache.providers.my_markdown_cache');
        $key = md5($funFact);
        if ($cache->contains($key)) {
            $funFact = $cache->fetch($key);
        } else {
            sleep(1);
            $funFact = $this->get('markdown.parser')
                ->transform($funFact);
            $cache->save($key, $funFact);
        }

        return $this->render('genus/show.html.twig', compact('name', 'funFact'));
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