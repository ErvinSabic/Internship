<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\Request;
    use App\Form\CategoryType;
    use App\Entity\Category;

    /**
    * @Route("/categories")
    */
    class CategoryController extends AbstractController {
        /**
        * @Route("/modify/{id}", defaults={"id"=0})
        */
        public function WhateverYouWant(Request $request, $id){
            $category = ($id ? $this->getDoctrine()->getRepository("App:Category")->find($id) : new Category);
            $em = $this->getDoctrine()->getManager();
            $form = $this->createForm(CategoryType::Class, $category);
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
