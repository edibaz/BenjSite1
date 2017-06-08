<?php

namespace Benj\benjBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Benj\benjBundle\Entity\Art;

class ArtController extends Controller
{
    public function AddAction()
    {
        return $this->render('benjBundle:Art:add.html.twig', array(
            // ...
        ));
    }

    public function UpdateArtAction()
    {
        return $this->render('benjBundle:Art:update_art.html.twig', array(
            // ...
        ));
    }

    public function ListArtAction()
    {
        return $this->render('benjBundle:Art:list_art.html.twig', array(
            // ...
        ));
    }

    public function DeleteArtAction()
    {
        return $this->render('benjBundle:Art:delete_art.html.twig', array(
            // ...
        ));
    }
    
    public function GalleryArtAction()
    {
        $em = $this->getDoctrine()->getManager();
        $all_arts = $em->getRepository('benjBundle:Art')->findAll();
        return $this->render('benjBundle:Art:gallery_art.html.twig', array('art' => $all_arts));
    }
    
    public function ShownArtAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $art_vu = $em->getRepository('benjBundle:Art')->find($id);
        $all_advise = $em->getRepository('benjBundle:Advise')->findBy(array('adviseArt' => $art_vu));
                
        return $this->render('benjBundle:Art:shown_art_parameters.html.twig', array('advises' => $all_advise, 'shown_art' => $art_vu));
    }
}
