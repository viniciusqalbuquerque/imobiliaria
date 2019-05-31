<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Endereco
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logradouro;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bairro;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $cep;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $complemento;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $cidade;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $uf;

    /**
     * @ORM\Column(type="integer", length=9, nullable=true)
     */
    private $telefone;

    /**
     * @ORM\Column(type="integer", length=2, nullable=true)
     */
    private $ddd;

    /**
     * @ORM\Column(type="integer", name="celular", length=9, nullable=true)
     */
    private $celular;

    /**
     * @ORM\Column(type="integer", name="ddd_celular", length=2, nullable=true)
     */
    private $dddCelular;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Usuario", mappedBy="endereco")
     */
    private $cliente;

//    /**
//     * @ORM\OneToOne(targetEntity="Entity\Imovel", mappedBy="endereco")
//     */
//    private $imovel;

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
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * @param mixed $logradouro
     */
    public function setLogradouro($logradouro): void
    {
        $this->logradouro = $logradouro;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro): void
    {
        $this->bairro = $bairro;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero): void
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep): void
    {
        $this->cep = $cep;
    }

    /**
     * @return mixed
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * @param mixed $complemento
     */
    public function setComplemento($complemento): void
    {
        $this->complemento = $complemento;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade): void
    {
        $this->cidade = $cidade;
    }

    /**
     * @return mixed
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param mixed $uf
     */
    public function setUf($uf): void
    {
        $this->uf = $uf;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone): void
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getDdd()
    {
        return $this->ddd;
    }

    /**
     * @param mixed $ddd
     */
    public function setDdd($ddd): void
    {
        $this->ddd = $ddd;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param mixed $celular
     */
    public function setCelular($celular): void
    {
        $this->celular = $celular;
    }

    /**
     * @return mixed
     */
    public function getDddCelular()
    {
        return $this->dddCelular;
    }

    /**
     * @param mixed $dddCelular
     */
    public function setDddCelular($dddCelular): void
    {
        $this->dddCelular = $dddCelular;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente): void
    {
        $this->cliente = $cliente;
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
}
