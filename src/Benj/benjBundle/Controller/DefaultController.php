<?php

namespace Benj\benjBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Benj\benjBundle\Entity\Art;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('benjBundle:Default:index.html.twig');
    }

    public function HomeAction() {
        $em = $this->getDoctrine()->getManager();

        $portrait = $em->getRepository('benjBundle:Art')->findBy(array('artCategory' => 'Portrait'));
        $nature = $em->getRepository('benjBundle:Art')->findBy(array('artCategory' => 'Nature'));
        $life = $em->getRepository('benjBundle:Art')->findBy(array('artCategory' => 'Life Scene'));

        return $this->render('benjBundle:Default:home.html.twig', array('portrait' => $portrait, 'nature' => $nature, 'life' => $life));
    }

    public function ContactAction() {
        return $this->render('benjBundle:Default:contact.html.twig');
    }

    public function AboutAction() {
        return $this->render('benjBundle:Default:about.html.twig');
    }

    public function EventsAction() {
        $em = $this->getDoctrine()->getManager();
        $all_events = $em->getRepository('benjBundle:Events')->findBy(array(), array('evByDate' => 'asc'));

        return $this->render('benjBundle:Default:events.html.twig', array(
                    'eventsList' => $all_events
        ));
    }

}
