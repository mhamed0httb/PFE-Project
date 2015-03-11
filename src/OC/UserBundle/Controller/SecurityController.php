<?php
// src/OC/UserBundle/Controller/SecurityController.php;

namespace OC\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use OC\UserBundle\Entity\User;

class SecurityController extends Controller
{
  public function loginAction(Request $request)
  {
    // Si le visiteur est déjà identifié, on le redirige vers l'accueil
    if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
      return $this->redirect($this->generateUrl('mhamed_cecilia_homepage'));
    }

    $session = $request->getSession();

    // On vérifie s'il y a des erreurs d'une précédente soumission du formulaire
    if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
      $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
    } else {
      $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
      $session->remove(SecurityContext::AUTHENTICATION_ERROR);
    }

    return $this->render('OCUserBundle:Security:login.html.twig', array(
      // Valeur du précédent nom d'utilisateur entré par l'internaute
      'last_username' => $session->get(SecurityContext::LAST_USERNAME),
      'error'         => $error,
    ));
  }


  public function adduserAction(){
    $userr = new User();
    $userr->setUsername('Maria');
    $userr->setFirstname('Maryam');
    $userr->setLastname('Nagati');
    $userr->setEmail('maryam.nagati@gmail.com');
    $userr->setPassword('nagati94');
    $userr->setPhone('54401748');
    $userr->setSalt('');
    $userr->setRoles(array('ROLE_USER'));
    $em=$this->getDoctrine()->getManager();
    $em->persist($userr);
    $em->flush();
    return $this->render('OCUserBundle:Security:adduser.html.twig',array('uss'=>$userr));
  }
}