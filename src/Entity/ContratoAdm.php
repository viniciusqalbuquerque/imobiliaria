<?php



namespace App\Entity;



use Doctrine\ORM\Mapping as ORM;



/**

 * @ORM\Entity

 */

class ContratoAdm

{

    /**

     * @return mixed

     */

    public function getId()

    {

        return $this->id;

    }



    /**

     * @param mixed $id

     */

    public function setId($id): void

    {

        $this->id = $id;

    }



    /**

     * @return mixed

     */

    public function getImovel()

    {

        return $this->imovel;

    }



    /**

     * @param mixed $imovel

     */

    public function setImovel($imovel): void

    {

        $this->imovel = $imovel;

    }



    /**

     * @return mixed

     */

    public function getUsuario()

    {

        return $this->usuario;

    }



    /**

     * @param mixed $usuario

     */

    public function setUsuario($usuario): void

    {

        $this->usuario = $usuario;

    }



    /**

     * @return string

     */

    public function getDtCadastro(): string

    {

        return $this->dtCadastro;

    }



    /**

     * @param string $dtCadastro

     */

    public function setDtCadastro(string $dtCadastro): void

    {

        $this->dtCadastro = $dtCadastro;

    }



    /**

     * @return string

     */

    public function getClausulaContratual(): string

    {

        return $this->clausulaContratual;

    }



    /**

     * @param string $clausulaContratual

     */

    public function setClausulaContratual(string $clausulaContratual): void

    {

        $this->clausulaContratual = $clausulaContratual;

    }

    /**

     * @ORM\Id

     * @ORM\Column(type="integer")

     * @ORM\GeneratedValue(strategy="AUTO")

     */

    private $id;



    /**

     * @ORM\ManyToOne(targetEntity="Entity\Imovel", inversedBy="contratoAdm")

     * @ORM\JoinColumn(name="imovel_id", referencedColumnName="id", unique=true)

     */

    private $imovel;



    /**

     * @ORM\ManyToOne(targetEntity="Entity\Usuario", inversedBy="contratoAdm")

     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id", unique=true)

     */

    private $usuario;



    /**

     * @var string

     * @ORM/Column(type="date")

     *

     */

    private $dtCadastro;



    /**

     * @var string

     * @ORM/Column(type="string")

     */

    private $clausulaContratual;









}