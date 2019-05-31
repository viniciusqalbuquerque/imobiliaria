<?php


namespace App\Forms;

use App\Entity\Usuario;
use function PHPSTORM_META\type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Class EnderecoType
 * @package App\Forms
 */
class EnderecoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('logradouro', TextType::class, [
                'label' => 'Logradouro:'
            ])
            ->add('bairro', TextType::class, [
                'label' => 'Bairro:',
            ])
            ->add('numero', TextType::class, [
                'label' => 'Numero:',
            ])
            ->add('cep', TextType::class, [
                'label' => 'CEP:',
            ])
            ->add('complemento', TextType::class, [
                'label' => 'Complemento',
            ])
            ->add('uf', TextType::class, [
                'label' => 'UF:',
            ])
            ->add('cidade', TextType::class, [
                'label' => 'Cidade:',
            ])
            ->add('ddd', TextType::class, [
                'label' => 'DDD:',
            ])
            ->add('telefone', TextType::class, [
                'label' => 'Telefone:',
            ])
            ->add('dddCelular', TextType::class, [
                'label' => 'DDD Celular:',
            ])
            ->add('celular', TextType::class, [
                'label' => 'Celular:',
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Usuario::class,
        ]);
    }
}
