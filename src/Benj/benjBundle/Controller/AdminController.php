<?php

namespace Benj\benjBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Benj\benjBundle\Entity\User;
use Benj\benjBundle\Entity\Art;
use Benj\benjBundle\Entity\Advise;
use Benj\benjBundle\Entity\Message;

class AdminController extends Controller {

    public function AdminManageNewArtAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser() ;
        
        if ($request->getMethod() == 'POST') {
            $artname = $request->get('art_name');
            $artcategory = $request->get('art_category');
            $artcomment = $request->get('art_comment');

            if ($artname == '' or $artcomment == '' or $artcategory == '') {
                $em = $this->getDoctrine()->getManager();
                $all = $em->getRepository('benjBundle:Art')->findAll();

                return $this->render('benjBundle:Admin:admin_new_art.html.twig', array(
                            'error' => 'Please enter a value in all fields', 
                            'artList' => $all,
                            'user' => $user
                ));
            } else {
                $art = new Art();
                $art->setArtName($request->get('art_name'));
                $art->setArtYear($request->get('art_year'));
                $art->setArtCategory($request->get('art_category'));
                $art->setArtDimensions($request->get('art_dimensions'));
                $art->setArtComment($request->get('art_comment'));
                $art->setArtLocation($request->get('art_small_location'));
                $art->setArtFullLocation($request->get('art_full_location'));

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($art);
                $em->flush();

                $artname = '';
                $artyear = 0;
                $artcategory = '';
                $artcomment = '';

                $em = $this->getDoctrine()->getManager();
                $all = $em->getRepository('benjBundle:Art')->findAll();

                return $this->render('benjBundle:Admin:admin_new_art.html.twig', array(
                        'success' => $art->getArtname(), 
                        'artList' => $all, 
                        'vide' => 0,
                        'user' => $user
                ));
            }
        } else {
            return $this->render('benjBundle:Admin:admin_new_art.html.twig', array(
                        'user' => $user
            ));
        }
    }

    public function AdminManageListArtsAction() {
        $user = $this->container->get('security.context')->getToken()->getUser() ;
        
        $em = $this->getDoctrine()->getManager();
        $all = $em->getRepository('benjBundle:Art')->findAll();
        
        return $this->render('benjBundle:Admin:admin_list_arts.html.twig', array(
                     'artList' => $all,
                     'user' => $user
        ));
    }
    
    public function AdminAfficheArtAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser() ;
        
        $em = $this->container->get('doctrine')->getEntityManager();
        $art = $em->getRepository('benjBundle:Art')->find($request->get('id'));
        
        return $this->render('benjBundle:Admin:admin_affiche_art.html.twig', array(
                     'art_affiche' => $art,
                     'user' => $user
        ));
    }
    
    public function AdminModifyArtAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser() ;
        
        $em = $this->container->get('doctrine')->getEntityManager();
        $art = $em->getRepository('benjBundle:Art')->find($request->get('id'));
        
        return $this->render('benjBundle:Admin:admin_modify_art.html.twig', array(
                    'art_affiche' => $art,
                    'user' => $user
        ));
    }
    
    public function AdminSaveArtAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser() ;
        
        $em = $this->container->get('doctrine')->getEntityManager();
        $art = $em->getRepository('benjBundle:Art')->find($request->get('id'));
                
        $art->setArtYear($request->get('modified_art_year'));
        $art->setArtCategory($request->get('modified_art_category'));
        $art->setArtDimensions($request->get('modified_art_dimensions'));
        $art->setArtComment($request->get('modified_art_comment'));
        
        $em->persist($art);
        $em->flush();

        return $this->redirect($this->generateUrl("_admin_manage_list_arts"));
    }
    
    //////******* Plus tard **********/////
    public function PreDeleteArtAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser() ;
        
        $em = $this->getDoctrine()->getManager();
        $art_vu = $em->getRepository('benjBundle:Art')->find($request->get('id'));
        
        return $this->render('benjBundle:Admin:admin_delete_art.html.twig', array('art' => $art_vu, 'user' => $user));
    }
    
    public function DeleteArtAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser() ;
        
        $em = $this->getDoctrine()->getManager();
        $art = $em->getRepository('benjBundle:Art')->find($request->get('id'));
        $em->remove($art);
        $em->flush();
        
        return $this->redirect($this->generateUrl("_admin_statistics", array('group' => 'advise', 'gender' => $request->get('gender'), 'user' => $user)));
    }
    //////******* Plus tard **********/////

    public function AdminStatisticsParametersAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser() ;
        
        $em = $this->getDoctrine()->getManager();
        
        $mess_unread = $em->getRepository('benjBundle:Message')->findBy(array('messIsRead' => 'False'));
        $mess_read = $em->getRepository('benjBundle:Message')->findBy(array('messIsRead' => 'True'), array('messReadDate' => 'desc'));
        
        $advise_unread = $em->getRepository('benjBundle:Advise')->findBy(array('adviseIsRead' => 'False'));
        $advise_read = $em->getRepository('benjBundle:Advise')->findBy(array('adviseIsRead' => 'True'), array('adviseReadDate' => 'desc'));

        $genre = $request->get('gender');
        $group = $request->get('group');
        
        $mess_block_read = '';
        $mess_block_unread = '';
        $adv_block_read = '';
        $adv_block_unread = '';

        switch ($group) {

            case 'message':
                if ($genre == 'read') {
                    $mess_block_read = 'active';
                    $mess_block_unread = '';
                } else {
                    $mess_block_read = '';
                    $mess_block_unread = 'active';
                }
                break;

            case 'advise':
                if ($genre == 'read') {
                    $adv_block_read = 'active';
                    $adv_block_unread = '';
                } else {
                    $adv_block_read = '';
                    $adv_block_unread = 'active';
                }
                break;
        }

        return $this->render('benjBundle:Admin:admin_statistics_parameters.html.twig', array(
                    'unread_messages' => $mess_unread,
                    'read_messages' => $mess_read,
                    'unread_advises' => $advise_unread,
                    'read_advises' => $advise_read,
                    'block_unread_messages' => $mess_block_unread,
                    'block_read_messages' => $mess_block_read,
                    'block_unread_advises' => $adv_block_unread,
                    'block_read_advises' => $adv_block_read,
                    'user' => $user
        ));
    }
}
