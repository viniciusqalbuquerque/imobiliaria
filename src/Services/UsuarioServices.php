<?php


namespace App\Services;


use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
use http\Client\Curl\User;

/**
 * Class UsuarioServices
 * @package App\Services
 */
class UsuarioServices
{

    /**
     * @var UsuarioRepository
     */
    private $usuarioRepository;

    /**
     * UsuarioServices constructor.
     * @param UsuarioRepository $usuarioRepository
     */
    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    /**
     * @param Usuario $usuario
     */
    public function salvar(Usuario $usuario)
    {
        $this->usuarioRepository->salvar($usuario);
    }

    public function deletar(int $id)
    {
        $this->usuarioRepository->deletar($id);
    }
}
