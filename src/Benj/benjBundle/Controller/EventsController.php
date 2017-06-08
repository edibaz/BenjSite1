<?php

namespace Benj\benjBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Benj\benjBundle\Entity\Events;

class EventsController extends Controller {

    public function AdminManageNewEventAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser();

        if ($request->getMethod() == 'POST') {

            $event = new Events();
            $event->setEvDate($request->get('event_date'));
            $event->setEvMoment($request->get('event_heure'));
            $event->setEvTitle($request->get('event_title'));
            $event->setEvPlace($request->get('event_place'));
            $event->setEvContent($request->get('event_content'));
            $event->setEvByDate(new \DateTime($request->get('event_date') . ' ' . $request->get('event_heure')));

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($event);
            $em->flush();

            return $this->render('benjBundle:Admin:admin_new_event.html.twig', array(
                        'user' => $user
            ));
        } else {
            return $this->render('benjBundle:Admin:admin_new_event.html.twig', array(
                        'user' => $user
            ));
        }
    }

    public function AdminListEventsAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $all_events = $em->getRepository('benjBundle:Events')->findBy(array() ,array('evByDate' => 'asc'));

        return $this->render('benjBundle:Admin:admin_list_events.html.twig', array(
                    'eventsList' => $all_events,
                    'user' => $user
        ));
    }
    
    public function AdminReadEventAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $read_event = $em->getRepository('benjBundle:Events')->find($request->get('id'));

        return $this->render('benjBundle:Admin:admin_affiche_events.html.twig', array(
                    'read_event' => $read_event,
                    'user' => $user
        ));
    }
    
    public function AdminEditEventAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $read_event = $em->getRepository('benjBundle:Events')->find($request->get('id'));

        return $this->render('benjBundle:Admin:admin_edit_event.html.twig', array(
                    'read_event' => $read_event,
                    'user' => $user
        ));
    }
    
    public function AdminSaveEventAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $edit_event = $em->getRepository('benjBundle:Events')->find($request->get('id'));
        
        $edit_event->setEvTitle($request->get('edit_event_title'));
        $edit_event->setEvPlace($request->get('edit_event_place'));
        $edit_event->setEvDate($request->get('edit_event_date'));
        $edit_event->setEvMoment($request->get('edit_event_moment'));
        $edit_event->setEvContent($request->get('edit_event_content'));
        $edit_event->setEvByDate(new \DateTime($request->get('edit_event_date') . ' ' . $request->get('edit_event_moment')));
        
        $em->persist($edit_event);
        $em->flush();

        return $this->redirect($this->generateUrl("_admin_manage_list_events"));
    }
    
    public function AdminPreDeleteEventAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $read_event = $em->getRepository('benjBundle:Events')->find($request->get('id'));

        return $this->render('benjBundle:Admin:admin_delete_event.html.twig', array(
                    'read_event' => $read_event,
                    'user' => $user
        ));
    }
    
    public function AdminDeleteEventAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $read_event = $em->getRepository('benjBundle:Events')->find($request->get('id'));
        $em->remove($read_event);
        $em->flush();

        return $this->redirect($this->generateUrl("_admin_manage_list_events"));
    }
}
