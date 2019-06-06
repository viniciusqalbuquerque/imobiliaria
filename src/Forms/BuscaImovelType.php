<?php


namespace App\Forms;

use App\Entity\Imovel;
use App\Entity\Usuario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Class BuscaImovelType
 * @package App\Forms
 */
class BuscaImovelType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->setAction('../imovel/portifolios')
            ->setMethod('POST')
            ->add('status', ChoiceType::class, [
                'label' => 'Status',
                'choices' => [
                    'Disponivel' => 'disponivel',
                    'Alugado' => 'alugado',
                    'Em Manutenção' => 'Em Manutenção',
                    'Vistoria' => 'Vistoria',
                    'Sem Cotrato Adm' => 'Sem Cotrato Adm',
                    'Sem Contrato de Locação' => 'Sem Contrato de Locação'
                ]

            ])
            ->add('tipoImovel', ChoiceType::class, [
                'empty_data' => 'Casa',
                'choices' => [
                    'Casa' => 'Casa',
                    'Apartamento' => 'Apartamento',
                    'Galpão' => 'Calpão',
                    'Terreno' => 'Terreno',
                    'Prédio Comercial' => 'Prédio Comercial',
                    'Loja em Shopping' => 'Loja em Shopping'
                ]
            ])
            ->add('dtCadastro', DateType::class, [
                'label' => 'Data de Cadastro',
                'widget' => 'single_text',
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('logradouro', TextType::class)
        ;
    }
}
