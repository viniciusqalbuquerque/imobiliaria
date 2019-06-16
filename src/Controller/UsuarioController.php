<?php

/**
 * Classe controller do usuário
 */
namespace App\Controller;

use App\Entity\Corretor;
use App\Forms\UsuarioType;
use App\Entity\Usuario;
use App\Services\UsuarioServices;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UsuarioController
 * @package App\Controller
 */
class UsuarioController extends AbstractController
{

    //*@IsGranted("ROLE_ADMIN")
    /**
     * @Route("/usuario", name="usuario_novo")
     */
    public function cadastroUsuario(Request $request, UsuarioServices $usuarioServices)
    {
        $usuario = new Usuario();
        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $usuario = $form->getData();
            $usuarioServices->salvar($usuario);

            return $this->redirectToRoute('index');
        }

        return $this->render('usuario_cadastro.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/listar", name="listar_usuarios")
     */
    public function listarUsuarios(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usuarios = $em->getRepository(Usuario::class)->findAll();

        return $this->render('listar_usuarios.html.twig', [
            'usuarios' => $usuarios
        ]);
    }

    /**
     * @Route("/editar/{id}", name="editar_usuario")
     */
    public function editarUsuario(int $id, Request $request, UsuarioServices $usuarioServices)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository(Usuario::class)->find($id);

        if (!$usuario) {
            throw new \Exception('Usuario não encontrado');
        }

        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $usuario = $form->getData();
            $usuarioServices->salvar($usuario);

            return $this->redirectToRoute('listar_usuarios');
        }

        return $this->render('usuario_cadastro.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/usuario/deletar/{id}", name="deletar_usuario")
     */
    public function deletarUsuario(int $id, UsuarioServices $usuarioServices)
    {
        $usuarioServices->deletar($id);
        $this->addFlash('success', 'Usuario de id:'.$id.' deletado com sucesso!!!');

        return $this->redirectToRoute('listar_usuarios');
    }
}
