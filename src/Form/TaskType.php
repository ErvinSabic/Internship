<?php
    namespace App\Form;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use App\Entity\Task;

    class TaskType extends AbstractType {
        public function buildForm(FormBuilderInterface $builder, array $options){
            $builder
                ->add("title", TextType::Class, [
                    'label'=>"Title"
                ])
                ->add("description", TextType::Class, [
                    'label'=>"Description"
                ])
                ->add("due", DateTimeType::Class, [
                    'label'=>"Due Date"
                ])
                ->add("submit", SubmitType::Class, [
                    'label'=>'Submit',
                    'attr'=>[
                        'class'=>'button'
                    ]
                ]);
        }

        public function configureOptions(OptionsResolver $resolver){
            $resolver->setDefaults(['data_class'=>Task::Class]);
        }
    }


?>
