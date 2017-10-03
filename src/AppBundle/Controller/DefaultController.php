<?php

namespace AppBundle\Controller;

use AppBundle\Form\TestType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $form = $this->createForm(TestType::class, null, [
        	'method' => 'POST'
		]);
        $form->handleRequest($request);

        $path = $this->getParameter('app_dir').'/../web/upload';

		if ($form->isSubmitted() && $form->isValid()) {
			$someNewFilename = 'coucou';
			/** @var UploadedFile $file */
			$file = $form['attachment']->getData();
			$i = $file->move($path, $file->getClientOriginalName());

			return $this->render('@App/default/index.html.twig', [
				'form' => $form->createView(),
				'myImage' => $file->getClientOriginalName()
			]);
		}

        return $this->render('@App/default/index.html.twig', [
        	'form' => $form->createView()
		]);
    }
}
