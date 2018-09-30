<?php

namespace MitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use MitBundle\Entity\TmUser;

class DefaultController extends Controller {

    /**
     * @Route("/api/auth")
     */
    public function indexAction(Request $request) {
        $login = $request->query->get("login");
        $password = $request->query->get("pwd");
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('MitBundle:TmUser')->findOneByUMail($login);
        if (!$user) {
            return new JsonResponse(['status' => 0, 'response' => 'Mail Not Found '], 200, array('Access-Control-Allow-Origin' => '*'));
        }

        $encoder = $this->get('security.encoder_factory')->getEncoder($user);
        $testpwd = $encoder->isPasswordValid($user->getUPassword(), $password, $user->getUSalt());

        if (!$testpwd) {
            return new JsonResponse(['status' => 0, 'response' => 'pwd not valid '], 200, array('Access-Control-Allow-Origin' => '*'));
        }

        return new JsonResponse(['status' => 1, 'response' => $testpwd], 200, array('Access-Control-Allow-Origin' => '*'));
    }

    /**
     * @Route("/api/getusers")
     * @param Request $request
     * @return JsonResponse7
     */
    public function getUsersAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('MitBundle:TmUser')->getallusers();

        return new JsonResponse($user, 200, array('Access-Control-Allow-Origin' => '*'));
    }

    /**
     * @Route("/api/postuser")
     * @param Request $request
     * @return JsonResponse
     */
    public function ActionposteUser(Request $request) {
        $uNom = $request->get('nom', 'jj');
        $uPrenom = $request->get('prenom', 'mm');
        $uMail = $request->get('mail', 'cimo');
        $uPassword = $request->get('pwd', '123456');
        $user = new TmUser();
        $encoder = $this->get('security.encoder_factory')->getEncoder($user);
        $cryptedpwd = $encoder->encodePassword($uPassword, $user->getSalt());

        $em = $this->getDoctrine()->getManager();
        $user->setUNom($uNom);
        $user->setUPrenom($uPrenom);
        $user->setUMail($uMail);
        $user->setUPassword($cryptedpwd);
        $em->persist($user);
        $em->flush();

        return new JsonResponse('doen', 200, array('Access-Control-Allow-Origin' => '*'));
    }

    /**
     * @Route("/api/getoneuser/{id}")
     * @param Request $request
     * @return JsonResponse
     */
    public function getOneUserAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('MitBundle:TmUser')->getOneUser($id);



        return new JsonResponse($user, 200, array('Access-Control-Allow-Origin' => '*'));
    }

    /**
     * @Route("/api/putuser/{id}")
     * @param Request $request
     * @return JsonResponse
     */
    public function putteUserAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('MitBundle:TmUser')->findOneBy(['uId' => $id]);
        $uNom = $request->get('nom', 'xxxx');
        $uPrenom = $request->get('prenom', 'ttt');
        $uMail = $request->get('mail', 'rrrrr');
        $uPassword = $request->get('pwd');

        if ($uPassword) {
            $encoder = $this->get('security.encoder_factory')->getEncoder($user);
            $cryptedpwd = $encoder->encodePassword($uPassword, $user->getSalt());
            $user->setUPassword($cryptedpwd);
        }

        $user->setUNom($uNom);
        $user->setUPrenom($uPrenom);
        $user->setUMail($uMail);

        $em->persist($user);
        $em->flush();

        return new JsonResponse(['Done'], 200, array('Access-Control-Allow-Origin' => '*'));
    }

    /**
     * @Route("/api/deleteuser/{id}")
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteteUserAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('MitBundle:TmUser')->findOneBy(['uId' => $id]);
        $em->remove($user);
        $em->flush();


        return new JsonResponse(['Done'], 200, array('Access-Control-Allow-Origin' => '*'));
    }

}
