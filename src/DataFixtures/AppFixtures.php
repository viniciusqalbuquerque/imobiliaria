<?php

namespace App\DataFixtures;

use App\Entity\Endereco;
use App\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    const NOMES = [
        "João", "Pedro", "Paulo", "Fabio", "Thiago", "Maria", "Luciana", "Oscar", "Bruna", "Carla", "Petronio",
        "Francisco", "Arthur", "Julio", "Ayrton", "Fabiano", "Luiz", "Neymar", "Natalia"
    ];
    const SOBRE_NOMES = [
        "Henrique Cardoso", "Rodrigues de Morais", "Bento de Souza", "Sousa", "Caetano Veloso", "Senna", "Lima",
        "Carvalho", "Araujo", "Eneias", "Amorin", "Regina de Carvalho", "Inacio da Silva", "Castro Pinto", "Lins do Rego",
        "Formiga"
    ];
    const LOGRADOUROS = [
        "Rua Carlos Fernendes", "Av Maranhão", "Travessa Miramar", "Rua Rita Sabino de Andrade", "Rua Oceano Pacifico",
        "AL. Dos Colibris", "Rua Manoel Soares", "Rua Ayrton Senna", "Rua Miguel Rodrigues", "Rua José Pereira",
        "Rua Joanita Cardoso", "Rua Cel José Pereira Lima"
    ];

    const BAIRROS = [
        "Aeroclube", "Padre Zé", "Treze de Maio", "Bessa", "Torre", "Jardim Oceania", "Colinas Do Sul", "Intermares",
        "Manaira", "Miramar", "José Américo", "Mangabeira", "Cabo Branco"
    ];

    const CIDADES = [
        'João Pessoa', 'Campina Grande', 'Princesa Isabel', 'São Paulo', 'Santa Inês', 'Caruarú', 'Recife', 'Natal',
        'Tavares', 'Triunfo'
    ];

    const CIDADES_UF = [
        'João Pessoa' => 'PB', 'Campina Grande' => 'PB', 'Princesa Isabel' => 'PB', 'São Paulo' => 'SP',
        'Santa Inês' => 'MA', 'Caruarú' => 'PE', 'Recife' => 'PE', 'Natal' => 'RN', 'Tavares' => 'PB', 'Triunfo' => 'PE'
    ];

    public function load(ObjectManager $manager): void
    {
        $this->loadEmderecos($manager);
//        $this->loadUsuarios($manager);
    }


    /**
     * @param ObjectManager $manager
     */
    private function loadEmderecos(ObjectManager $manager): void
    {
        for($i = 1; $i = 5; $i++) {

            $endereco = new Endereco();
            $endereco->setLogradouro(self::LOGRADOUROS[rand (0 , 10 )]);
            $endereco->setBairro(self::BAIRROS[rand(0, 12)]);
            $endereco->setNumero(rand(1, 2000));
            $endereco->setCep($this->cepRandom());

            $cidade = self::CIDADES[rand(0, 9)];
            $uf = self::CIDADES_UF[$cidade];

            $endereco->setCidade($cidade);
            $endereco->setUf($uf);

            $manager->persist($endereco);
        }

        $manager->flush();
    }

    private function loadUsuarios(ObjectManager $manager): void
    {
        $enderecos = $manager->getRepository(Endereco::class)->findAll();

        foreach ($enderecos as $endereco) {

            $usuario = new Usuario();
            $usuario->setNome(self::NOMES[rand(0, 18)].' '.self::SOBRE_NOMES[rand(0, 15)]);
            $usuario->setCpfCnpj($this->cpfRandom());
            $usuario->setEndereco($endereco);
            $usuario->setDtNascimento($this->randomDateAniversario());
            $usuario->setDtCadastro($this->randomDateCadastro());
        }

    }

    private function loadImoveis(ObjectManager $manager)
    {
//        $enderecos = $manager->getRepository(Endereco::class)->findAll();
//
//        foreach ($enderecos as $endereco) {
//            $imovel = new Imovel();
//            $imovel->setEndreco($endereco);
//            $imovel->setDtCadastro($this->randomDateCadastro());
//        }

    }

    private function loadContratoAdm(ObjectManager $manager)
    {

    }

    private function loadContratoLocacao(ObjectManager $manager)
    {

    }

    /**
     * @param DateTime $start
     * @param DateTime $end
     * @return DateTime
     */
    private function randomDateAniversario()
    {
        $start = new \DateTime('01/01/1930');
        $end = new \DateTime('01/01/2005');
        $randomTimestamp = mt_rand($start->getTimestamp(), $end->getTimestamp());
        $randomDate = new DateTime();
        $randomDate->setTimestamp($randomTimestamp);
        return $randomDate;
    }

    /**
     * @param DateTime $start
     * @param DateTime $end
     * @return DateTime
     */
    private function randomDateCadastro()
    {
        $start = new \DateTime('01/01/2015');
        $end = new \DateTime('01/06/2019');
        $randomTimestamp = mt_rand($start->getTimestamp(), $end->getTimestamp());
        $randomDate = new DateTime();
        $randomDate->setTimestamp($randomTimestamp);
        return $randomDate;
    }

    /**
     * @return string
     */
    private function cepRandom()
    {
        return  rand(1, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).'-'.rand(0, 9).rand(0, 9).rand(0, 9);
    }

    /**
     * Método para gerar CPF válido, com máscara ou não
     * @example cpfRandom(0)
     *          para retornar CPF sem máscar
     * @param int $mascara
     * @return string
     */
    private function cpfRandom($mascara = "1"): string
    {
        $n1 = rand(0, 9);
        $n2 = rand(0, 9);
        $n3 = rand(0, 9);
        $n4 = rand(0, 9);
        $n5 = rand(0, 9);
        $n6 = rand(0, 9);
        $n7 = rand(0, 9);
        $n8 = rand(0, 9);
        $n9 = rand(0, 9);
        $d1 = $n9 * 2 + $n8 * 3 + $n7 * 4 + $n6 * 5 + $n5 * 6 + $n4 * 7 + $n3 * 8 + $n2 * 9 + $n1 * 10;
        $d1 = 11 - (self::mod($d1, 11) );
        if ($d1 >= 10) {
            $d1 = 0;
        }
        $d2 = $d1 * 2 + $n9 * 3 + $n8 * 4 + $n7 * 5 + $n6 * 6 + $n5 * 7 + $n4 * 8 + $n3 * 9 + $n2 * 10 + $n1 * 11;
        $d2 = 11 - (self::mod($d2, 11) );
        if ($d2 >= 10) {
            $d2 = 0;
        }
        $retorno = '';
        if ($mascara == 1) {
            $retorno = '' . $n1 . $n2 . $n3 . "." . $n4 . $n5 . $n6 . "." . $n7 . $n8 . $n9 . "-" . $d1 . $d2;
        } else {
            $retorno = '' . $n1 . $n2 . $n3 . $n4 . $n5 . $n6 . $n7 . $n8 . $n9 . $d1 . $d2;
        }
        return $retorno;
    }

    /**
     * @param $dividendo
     * @param $divisor
     * @return float
     */
    private static function mod($dividendo, $divisor): float
    {
        return round($dividendo - (floor($dividendo / $divisor) * $divisor));
    }
}