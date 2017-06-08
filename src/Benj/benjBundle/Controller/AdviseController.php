<?php

namespace Benj\benjBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Benj\benjBundle\Entity\Advise;
use Benj\benjBundle\Entity\Art;

class AdviseController extends Controller
{
    public function NewAdviseAction(Request $request)
    {        
        if ($request->getMethod() == 'POST') {   
            
            $manager = $this->getDoctrine()->getManager();
            $advise_art = $manager->getRepository('benjBundle:Art')->find($request->get('id')); 
                                    
            $advise = new Advise();
            $advise->setAdviseAuthor($request->get('mess_author'));
            $advise->setAdviseEmail($request->get('mess_email'));
            $advise->setAdviseContent($request->get('mess_content'));
            $advise->setAdviseIsRead('False');
            $advise->setAdviseResponse('False');
            $advise->setAdviseDate(new \DateTime('now'));
            $advise->setAdviseArt($advise_art);
            $advise->setAdviseArtLocation($advise_art->getArtFullLocation());
            
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($advise);
            $em->flush();
            
            return $this->redirect( $this->generateUrl('_shown_art' ,array('id' => $advise_art->getId()))) ;
            
        } else {
            return $this->redirect( $this->generateUrl('_shown_art' ,array('id' => $advise_art->getId()))) ;
        }
    }
    
    public function ReadAdviseAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser() ;
        
        $em = $this->getDoctrine()->getManager();
        $art_vu = $em->getRepository('benjBundle:Art')->find($request->get('artId'));
        $all_advise = $em->getRepository('benjBundle:Advise')->find($request->get('id'));
        $all_advise->setAdviseIsRead('True');
        $all_advise->setAdviseReadDate(new \DateTime('now'));
        $em->persist($all_advise);
        $em->flush();
        
        $tabs = $request->get('advise_group');
                
        return $this->render('benjBundle:Advise:read_advise.html.twig', array('advises' => $all_advise, 'shown_art' => $art_vu, 'user' => $user, 'tab' => $tabs));
    }
    
    public function PreAdviseAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser() ;
        
        $em = $this->getDoctrine()->getManager();
        $art_vu = $em->getRepository('benjBundle:Art')->find($request->get('artId'));
        $all_advise = $em->getRepository('benjBundle:Advise')->find($request->get('id'));
        
        $gender = $request->get('gender');
                
        return $this->render('benjBundle:Advise:response_advise.html.twig', array('tab' => $gender, 'advises' => $all_advise, 'shown_art' => $art_vu, 'user' => $user));
    }
    
    public function PreDeleteAdviseAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser() ;
        
        $em = $this->getDoctrine()->getManager();
        $art_vu = $em->getRepository('benjBundle:Art')->find($request->get('artId'));
        $all_advise = $em->getRepository('benjBundle:Advise')->find($request->get('id'));
        
        $gender = $request->get('gender');
                
        return $this->render('benjBundle:Advise:delete_advise.html.twig', array('tab' => $gender, 'advises' => $all_advise, 'shown_art' => $art_vu, 'user' => $user));
    }
    
    public function ResponseAdviseAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser() ;
        
        $em = $this->getDoctrine()->getManager();
        $advise = $em->getRepository('benjBundle:Advise')->find($request->get('id'));
        $advise->setAdviseResponseContent($request->get('advise_responseContent'));
        $advise->setAdviseResponse('True');
        $em->persist($advise);
        $em->flush();
        
        $tabs = $request->get('tab');
                
        return $this->redirect( $this->generateUrl('_admin_statistics', array('group' => 'advise', 'gender' => $tabs, 'user' => $user))) ;
    }

    public function DeleteAdviseAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser() ;
        
        $em = $this->getDoctrine()->getManager();
        $advise = $em->getRepository('benjBundle:Advise')->find($request->get('id'));
        $em->remove($advise);
        $em->flush();
        
        return $this->redirect($this->generateUrl("_admin_statistics", array('group' => 'advise', 'gender' => $request->get('gender'), 'user' => $user)));
    }
}
