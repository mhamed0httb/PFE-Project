<?php

// src/Mhamed/CeciliaBundle/Controller/MainController.php

namespace Mhamed\CeciliaBundle\Controller;

use Mhamed\CeciliaBundle\Entity\Advise;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use OC\UserBundle\Entity\User;
use Mhamed\CeciliaBundle\Entity\Contact;

class MainController extends Controller
{

	public function homeAction(){
		$user=$this->getUser();
		if(null===$user){
			return $this->render('MhamedCeciliaBundle:Main:homepage.html.twig');
		}else{
			return $this->render('MhamedCeciliaBundle:Main:homepage user.html.twig');
		}
		
	}


	public function testAction(){
		$user=$this->getUser();
		if(null===$user){
			return $this->render('MhamedCeciliaBundle:Main:test sante page.html.twig');
		}else{
			return $this->render('MhamedCeciliaBundle:Main:test sante user page.html.twig');
		}
		
	}


	public function addAction(){

		$adv = new Advise();
		$adv->setAdviseName('');
		$adv->setHeadSection('');
		$adv->setMainSection('');
		$adv->setTopic('');
		$adv->setImage('');
		$em=$this->getDoctrine()->getManager();
		$em->persist($adv);
		$em->flush();
		return $this->render('MhamedCeciliaBundle:Main:test sante page.html.twig');
	}


	public function showAdviseAction($id){
		$user=$this->getUser();
		if(null===$user){
			$rep = $this->getDoctrine()->getManager()->getRepository('MhamedCeciliaBundle:Advise');
		$adv = $rep->find($id);
        if (null === $adv) {
          return $this->render('MhamedCeciliaBundle:Main:advise not found.html.twig',array('id'=>$id));
    }
		return $this->render('MhamedCeciliaBundle:Main:conseil article page.html.twig',array('theAdvise'=>$adv));

		}else{



		$rep = $this->getDoctrine()->getManager()->getRepository('MhamedCeciliaBundle:Advise');
		$adv = $rep->find($id);
        if (null === $adv) {
          return $this->render('MhamedCeciliaBundle:Main:advise not found user.html.twig',array('id'=>$id));
    }
		return $this->render('MhamedCeciliaBundle:Main:conseil article user page.html.twig',array('theAdvise'=>$adv));
	}
	}


	public function advisesAction(){

		$rep = $this->getDoctrine()->getManager()->getRepository('MhamedCeciliaBundle:Advise');
		$adv1 = $rep->find(3);
		$adv2 = $rep->find(4);
		$adv3 = $rep->find(5);
		$adv4 = $rep->find(6);
		$adv=array($adv1,$adv2,$adv3,$adv4);
		return $this->render('MhamedCeciliaBundle:Main:conseils page.html.twig',array('theAdvise'=>$adv));

	}


	public function QaAction(Request $request){
		// On crée un objet Advert
    $con = new Contact();

    // On crée le FormBuilder grâce au service form factory
    $formBuilder = $this->get('form.factory')->createBuilder('form', $con);

    // On ajoute les champs de l'entité que l'on veut à notre formulaire
    $formBuilder
      ->add('name',      'text',array('attr' => array('class'=>'form-control','placeholder'=>'Your Name *','id'=>'name')))
      ->add('phone',   'number',array('attr' => array('class'=>'form-control','placeholder'=>'Your Phone *','id'=>'phone','data-validation-required-message'=>'Please enter your phone number.')))
      ->add('email',    'email',array('attr' => array('class'=>'form-control','placeholder'=>'Your Email *','id'=>'email')))
      ->add('message',    'textarea',array('attr' => array('class'=>'form-control','placeholder'=>'Your Message *','id'=>'message')))
      ->add('Send',      'submit',array('attr' => array('class'=>'btn btn-xl')))
    ;
    // Pour l'instant, pas de candidatures, catégories, etc., on les gérera plus tard

    // À partir du formBuilder, on génère le formulaire
    $form = $formBuilder->getForm();



    $form->handleRequest($request);

    // On vérifie que les valeurs entrées sont correctes
    // (Nous verrons la validation des objets en détail dans le prochain chapitre)
    if ($form->isValid()) {

     

      $url=$this->get('router')->generate('mhamed_cecilia_homepage');
      return new RedirectResponse($url);


    }

    // À ce stade, le formulaire n'est pas valide car :
    // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
    // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
    return $this->render('MhamedCeciliaBundle:Main:adduser.html.twig', array(
      'form' => $form->createView(),
    ));

	}
	public function modalAction(){
		return $this->render('MhamedCeciliaBundle:Main:modal.html.twig');

	}









}