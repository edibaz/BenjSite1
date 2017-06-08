<?php

namespace Benj\benjBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Benj\benjBundle\Entity\Message;

class MessageController extends Controller {

    public function NewMessageAction(Request $request) {
        if ($request->getMethod() == 'POST') {
            $messAuthor = $request->get('mess_author');
            $messEmail = $request->get('mess_email');
            $messPhone = $request->get('mess_phone');
            $messSubject = $request->get('mess_subject');
            $messContent = $request->get('mess_content');

            $message = new Message();
            $message->setMessAuthor($messAuthor);
            $message->setMessEmail($messEmail);
            $message->setMessContent($messContent);
            $message->setMessSubject($messSubject);
            $message->setMessPhone($messPhone);
            $message->setMessIsRead('False');
            $message->setMessResponse('False');
            $message->setMessDate(new \DateTime('now'));

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($message);
            $em->flush();

            return $this->render('benjBundle:Message:contact_me.html.twig', array('notification' => 'True'));
        } else {
            return $this->render('benjBundle:Message:contact_me.html.twig', array('notification' => 'False'));
        }
    }

    public function ListMessageAction() {
        return $this->render('benjBundle:Message:list_message.html.twig', array());
    }

    public function PreDeleteMessageAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $mess = $em->getRepository('benjBundle:Message')->find($request->get('id'));

        $tabs = $request->get('message_group');

        return $this->render('benjBundle:Message:delete_message.html.twig', array(
                    'message' => $mess,
                    'tab' => $tabs,
                    'user' => $user
        ));
    }

    public function DeleteMessageAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $message = $em->getRepository('benjBundle:Message')->find($request->get('id'));
        $em->remove($message);
        $em->flush();

        return $this->redirect($this->generateUrl("_admin_statistics", array('group' => 'message', 'gender' => $request->get('gender'), 'user' => $user)));
    }

    public function ReadMessageAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser();
        
        $tabs = $request->get('message_group');
        $avertissement = $request->get('mail');
        $em = $this->getDoctrine()->getManager();
        $mess = $em->getRepository('benjBundle:Message')->find($request->get('id'));

        switch ($avertissement) {

            case 'false':
                
                $mess->setMessIsRead('True');
                $mess->setMessReadDate(new \DateTime('now'));
                $em->persist($mess);
                $em->flush();
                
                $mailer = $this->get('mailer') ;                
                $message = \Swift_Message:: newInstance( )
                    ->setSubject('Reading notification')
                    ->setFrom(array('artist@benjkinenga.com' => "Benj KINENGA"))
                    ->setTo($mess->getMessEmail())
                    ->setCharset('utf-8')
                    ->setBody($this->renderView('benjBundle:Message:notification.html.twig', array('message' => $mess,)));
                $mailer->send($message);
                                
                return $this->render('benjBundle:Message:read_message.html.twig', array(
                    'message' => $mess,
                    'tab' => $tabs,
                    'user' => $user
                    ));
                break;
            
            case 'true':
                return $this->render('benjBundle:Message:read_message.html.twig', array(
                    'message' => $mess,
                    'tab' => $tabs,
                    'user' => $user
                    ));
                break;
        }        
    }

    public function MailMessageAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser();
        
        $em = $this->getDoctrine()->getManager();
        $mess = $em->getRepository('benjBundle:Message')->find($request->get('id'));

        $transport = \Swift_SmtpTransport::newInstance('mail.supremecluster.com', 25)
                ->setUsername('artist@benjkinenga.com')
                ->setPassword('Masina147');
        $mailer = \Swift_Mailer::newInstance($transport);
        $mail = \Swift_Message::newInstance()
                ->setSubject($request->get('mail_subject'))
                ->setFrom(array('artist@benjkinenga.com' => "Benj KINENGA"))
                ->setTo($mess->getMessEmail())
                ->setCharset('utf-8')
                ->setBody($request->get('mail_content') . "\n\n\nPlease visite www.benjkinenga.com for more informations about me.\nPhone: 00 (86) 150 0514 4597 \nLocation: 74, Beinjin West Road, Guluo District, Nanjing, Jiangsu (China).");

        if ($mailer->send($mail)) {
            $mess->setMessResponse('True');
            $mess->setMessResponseSubject($request->get('mail_subject'));
            $mess->setMessREsponseContent($request->get('mail_content'));
            $em->persist($mess);
            $em->flush();
            return $this->redirect($this->generateUrl('_admin_statistics', array('group' => 'message', 'gender' => $request->get('gender'), 'user' => $user)));
        } else {
            return $this->redirect($this->generateUrl('_admin_statistics', array('group' => 'message', 'gender' => $request->get('gender'), 'user' => $user)));
        }
    }

    public function ResponseMessageAction(Request $request) {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $mess = $em->getRepository('benjBundle:Message')->find($request->get('id'));

        $gender = $request->get('gender');

        return $this->render('benjBundle:Message:response.html.twig', array(
                    'message' => $mess,
                    'tab' => $gender,
                    'user' => $user
        ));
    }

}
