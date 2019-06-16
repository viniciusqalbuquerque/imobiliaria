<?php



namespace App\Entity;



use Doctrine\ORM\Mapping as ORM;



/**

 * @ORM\Entity

 */

class ContratoLocacao

{



    /**

     * @ORM\Id

     * @ORM\Column(type="integer")

     * @ORM\GeneratedValue(strategy="AUTO")

     */

    private $id;





    /**

     * @ORM\Column(type="date", nullable=true)

     */

    private $dtCadastro;





    /**

     * @ORM\Column(type="date", nullable=true)

     */

    private $dtValidade;



    /**

     * @ORM\Column(type="string")

     */

    private $formaPagamento;



    /**

     * @ORM\Column(type="date", nullable=true)

     */

    private $dtVencimento;



    /**

     * @ORM\Column(type="string")

     */

    private $clausulaContratual;



    /**

     * @ORM\ManyToOne(targetEntity="Entity\Imovel", inversedBy="contratoLocacao")

     * @ORM\JoinColumn(name="imovel_id", referencedColumnName="id", unique=true)

     */

    private $imovel;



    /**

     * @ORM\ManyToOne(targetEntity="Entity\Usuario", inversedBy="contratoLocacao")

     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id", unique=true)

     */

    private $usuario;



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

    public function getDtCadastro()

    {

        return $this->dtCadastro;

    }



    /**

     * @param mixed $dtCadastro

     */

    public function setDtCadastro($dtCadastro): void

    {

        $this->dtCadastro = $dtCadastro;

    }



    /**

     * @return mixed

     */

    public function getDtValidade()

    {

        return $this->dtValidade;

    }



    /**

     * @param mixed $dtValidade

     */

    public function setDtValidade($dtValidade): void

    {

        $this->dtValidade = $dtValidade;

    }



    /**

     * @return mixed

     */

    public function getFormaPagamento()

    {

        return $this->formaPagamento;

    }



    /**

     * @param mixed $formaPagamento

     */

    public function setFormaPagamento($formaPagamento): void

    {

        $this->formaPagamento = $formaPagamento;

    }



    /**

     * @return mixed

     */

    public function getDtVencimento()

    {

        return $this->dtVencimento;

    }



    /**

     * @param mixed $dtVencimento

     */

    public function setDtVencimento($dtVencimento): void

    {

        $this->dtVencimento = $dtVencimento;

    }



    /**

     * @return mixed

     */

    public function getClausulaContratual()

    {

        return $this->clausulaContratual;

    }



    /**

     * @param mixed $clausulaContratual

     */

    public function setClausulaContratual($clausulaContratual): void

    {

        $this->clausulaContratual = $clausulaContratual;

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











}