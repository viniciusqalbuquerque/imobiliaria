<?php


namespace App\Forms;

use App\Entity\Imovel;
use App\Entity\Usuario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Class ImovelType
 * @package App\Forms
 */
class ImovelType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
//            ->setAction('../usuario')
//            ->setMethod('POST')
            ->add('status', TextType::class, [
                'label' => 'Status'
            ])
            ->add('caracteristicas', TextType::class, [
                'label' => 'Caracterisiticas do Imovel',
            ])
            ->add('observacao', TextType::class, [
                'label' => 'Observações Geral',
            ])
            ->add('tipoImovel', TextType::class, [
                'label' => 'Tipo do Imovel',
            ])
            ->add('dtCadastro', DateType::class, [
                'label' => 'Data de Cadastro',
                'widget' => 'single_text',
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('endereco', EnderecoType::class)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Imovel::class,
        ]);
    }
}