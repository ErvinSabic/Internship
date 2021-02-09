<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\Request;
    use App\Form\TaskType;
    use App\Entity\Task;

    /**
    * @Route("/tasks")
    */
    class TaskController extends AbstractController {
        /**
        * @Route("/")
        */
        public function IndexAction() {
            return $this->render('tasks/tasks.html.twig', ["tasks"=>$this->getDoctrine()->getRepository("App:Task")->findAll()]);
        }

        /**
        * @Route("/modify/{id}", defaults={"id"=0})
        */
        public function WhateverYouWant(Request $request, $id){
            $task = ($id ? $this->getDoctrine()->getRepository("App:Task")->find($id) : new Task);
            $form = $this->createForm(TaskType::class, $task);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $data = $form->getData();
                $this->getDoctrine()->getManager()->persist($data);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirect('/tasks/'.$task->getId());
            }

            return $this->render("tasks/add.html.twig", ["form"=>$form->createView()]);
        }

        /**
        * @Route("/{id}")
        */
        public function DetailAction($id) {
            return $this->render("tasks/task.html.twig", ["task"=>$this->getDoctrine()->getRepository("App:Task")->find($id)]);
        }
    }
?>
