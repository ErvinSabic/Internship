<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\Request;
    use App\Form\PersonType;
    use App\Entity\Person;

    /**
    * @Route("/people")
    */
    class PersonController extends AbstractController {
        /**
        * @Route("/modify/{id}", defaults={"id"=0})
        */
        public function WhateverYouWant(Request $request, $id){
            $category = ($id ? $this->getDoctrine()->getRepository("App:Person")->find($id) : new Person);
            $em = $this->getDoctrine()->getManager();
            $form = $this->createForm(PersonType::Class, $category);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $data = $form->getData();
                $em->persist($data);
                $em->flush();
                return $this->redirect("/tasks/");
            }

            return $this->render("categories/add.html.twig", ["form"=>$form->createView()]);
        }
    }

?>
