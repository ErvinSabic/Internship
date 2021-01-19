<?php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;

    class TaskController extends AbstractController {
        /**
        * @Route("/tasks")
        */
        public function IndexAction() {
            return $this->render('tasks/tasks.html.twig', ["tasks"=>$this->getDoctrine()->getRepository("App:Task")->findAll()]);
        }
    }
?>
