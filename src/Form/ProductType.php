<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;

use App\Form\DataTransformer\TagTransformer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
class ProductType extends AbstractType

{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('name')
            ->add('price')
            ->add('text')
            ->add('author')
            ->add('category', EntityType::class, [
                'class' => Category::class,
//                'query_builder' => function (EntityRepository $er): QueryBuilder {
//                    return $er->createQueryBuilder('u')
//                        ->orderBy('u.username', 'ASC');
//                },
                'required'   => false,
                'empty_data' => null,
                'choice_label' => 'name',])

        ;

    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
