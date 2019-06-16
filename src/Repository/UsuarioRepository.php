<?php





namespace App\Repository;





use App\Entity\Usuario;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

use Doctrine\Common\Persistence\ManagerRegistry;

use Doctrine\ORM\EntityManager;

use Symfony\Bridge\Doctrine\RegistryInterface;



class UsuarioRepository extends ServiceEntityRepository

{

    public function __construct(RegistryInterface $registry)

    {

        parent::__construct($registry, Usuario::class);

    }



    /**

     * @param Usuario $usuario

     * @return void

     * @throws \Doctrine\ORM\ORMException

     * @throws \Doctrine\ORM\OptimisticLockException

     */

    public function salvar(Usuario $usuario)

    {

        $em = $this->getEntityManager();

        $em->persist($usuario);

        $em->flush();

    }



    public function deletar(int $id)

    {

        $em = $this->getEntityManager();

        $usuario = $em->getRepository(Usuario::class)->find($id);

        $em->remove($usuario);

        $em->flush();



    }

}