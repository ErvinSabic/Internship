<?php
    namespace App\Form;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use App\Entity\Category;

    class CategoryType extends AbstractType {
        public function buildForm(FormBuilderInterface $builder, array $options){
            $builder
                ->add("name", TextType::Class, [
                    "label"=>"My fancy smacny name."
                ])
                ->add("submit", SubmitType::Class, [
                    'label'=>"Send my boi",
                    'attr'=>[
                        "data-example"=>"asdf12345",
                        "class"=>"button"
                    ]
                ]);
        }

        public function configureOptions(OptionsResolver $resolver){
            $resolver->setDefaults(['data_class'=>Category::Class]);
        }
    }


?>
