<?php

namespace Foro\UsuariosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Foro\bdBundle\Entity\usuarios;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UsuariosBundle:Default:index.html.twig');
    }
	
	public function registroAction(Request $request){
		if($request->getMethod()=='POST')
		{
			$usuario = new usuarios();
    		$usuario->setCorreo($request->get('correo'));
    		$usuario->setClave($request->get('clave'));			    		
    	$em = $this->getDoctrine()->getManager();
    	$em->persist($usuario);
	    $em->flush();
			
			$this->get('session')->getFlashBag()->add(
            	'notice',
            	'Se ha registrado correctamente'
        	);						
		
		}
        return $this->render('UsuariosBundle:Default:registro.html.twig');
	}		
	
}