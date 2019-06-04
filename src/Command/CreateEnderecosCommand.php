<?php


namespace App\Command;


use App\Entity\Endereco;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateEnderecosCommand extends Command
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

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:create-emderecos';

    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Creando endereços Fack')
            ->setHelp('Comando para gerar endereços aleatórios...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Gerando Endereços no banco Sqlite");
        $this->loadEmderecos($this->entityManager);
        $output->writeln("Endereços gerados com sucesso!!!!");
    }


    /**
     * @param ObjectManager $manager
     */
    private function loadEmderecos(ObjectManager $manager): void
    {
        for($i = 1; $i <= 20; $i++) {

            $endereco = new Endereco();
            $endereco->setLogradouro(self::LOGRADOUROS[rand (0 , 10 )]);
            $endereco->setBairro(self::BAIRROS[rand(0, 12)]);
            $endereco->setNumero(rand(1, 2000));
            $endereco->setCep($this->cepRandom());
            $endereco->setDddTelefone(rand(10, 99));
            $endereco->setTelefone(
                '9'.''.rand(0,9).''.rand(0,9).''.rand(0,9).''.rand(0,9).'-'.rand(0,9).''.rand(0,9).''.rand(0,9).''.rand(0,9)
            );
            $endereco->setDddCelular(rand(10, 99));
            $endereco->setCelular(
                '9'.''.rand(0,9).''.rand(0,9).''.rand(0,9).''.rand(0,9).'-'.rand(0,9).''.rand(0,9).''.rand(0,9).''.rand(0,9)
            );
            $cidade = self::CIDADES[rand(0, 9)];
            $uf = self::CIDADES_UF[$cidade];

            $endereco->setCidade($cidade);
            $endereco->setUf($uf);

            $manager->persist($endereco);
        }

        $manager->flush();
    }

    /**
     * @return string
     */
    private function cepRandom()
    {
        return  rand(1, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).'-'.rand(0, 9).rand(0, 9).rand(0, 9);
    }



}