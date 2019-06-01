<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Imovel
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $caracteristicas;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $observacao;

    /**
     * @ORM\Column(type="string",name="tipo_imovel" length=150, nullable=true)
     */
    private $tipoImovel;

    /**
     * @ORM\Column(type="datetime",name="dt_cadastro", nullable=true)
     */
    private $dtCadastro;

    /**
     * @ORM\OneToOne(targetEntity="Entity\Endereco", inversedBy="imovel")
     * @ORM\JoinColumn(name="id_endereco", referencedColumnName="id", unique=true)
     */
    private $endereco;

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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCaracteristicas()
    {
        return $this->caracteristicas;
    }

    /**
     * @param mixed $caracteristicas
     */
    public function setCaracteristicas($caracteristicas): void
    {
        $this->caracteristicas = $caracteristicas;
    }

    /**
     * @return mixed
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * @param mixed $observacao
     */
    public function setObservacao($observacao): void
    {
        $this->observacao = $observacao;
    }

    /**
     * @return mixed
     */
    public function getTipoImovel()
    {
        return $this->tipoImovel;
    }

    /**
     * @param mixed $tipoImovel
     */
    public function setTipoImovel($tipoImovel): void
    {
        $this->tipoImovel = $tipoImovel;
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
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco): void
    {
        $this->endereco = $endereco;
    }

//    /**
//     * @ORM\OneToMany(targetEntity="Entity\contratoLocacao", mappedBy="imovel")
//     */
//    private $contratoLocacao;
//
//    /**
//     * @ORM\OneToMany(targetEntity="Entity\ContratoAdm", mappedBy="imovel")
//     */
//    private $contratoAdm;
}