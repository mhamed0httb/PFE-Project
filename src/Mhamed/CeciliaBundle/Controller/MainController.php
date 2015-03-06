<?php

// src/Mhamed/CeciliaBundle/Controller/MainController.php

namespace Mhamed\CeciliaBundle\Controller;

use Mhamed\CeciliaBundle\Entity\Advise;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MainController extends Controller
{

	public function homeAction(){
		return $this->render('MhamedCeciliaBundle:Main:homepage.html.twig');
	}


	public function testAction(){
		return $this->render('MhamedCeciliaBundle:Main:test sante page.html.twig');
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

		$rep = $this->getDoctrine()->getManager()->getRepository('MhamedCeciliaBundle:Advise');
		$adv = $rep->find($id);
        if (null === $adv) {
          return $this->render('MhamedCeciliaBundle:Main:advise not found.html.twig');
    }
		return $this->render('MhamedCeciliaBundle:Main:conseil article page.html.twig',array('theAdvise'=>$adv));
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









}