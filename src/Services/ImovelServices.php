<?php


namespace App\Services;

use App\Entity\Imovel;
use App\Repository\ImovelRepository;
use http\Client\Curl\User;

/**
 * Class ImovelServices
 * @package App\Services
 */
class ImovelServices
{
    /**
     * @var ImovelRepository
     */
    private $imovelRepository;

    /**
     * ImovelServices constructor.
     * @param ImovelRepository $ImovelRepository
     */
    public function __construct(ImovelRepository $imovelRepository)
    {
        $this->imovelRepository = $imovelRepository;
    }

    /**
     * @param Imovel $imovel
     */
    public function salvar(Imovel $imovel)
    {
        $this->imovelRepository->salvar($imovel);
    }

    public function deletar(int $id){
        $this->imovelRepository->deletar($id);
    }

}