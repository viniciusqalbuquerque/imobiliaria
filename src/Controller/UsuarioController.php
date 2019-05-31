<?php


namespace App\Controller;

use App\Forms\UsuarioType;
use App\Entity\Usuario;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UsuarioController
 * @package App\Controller
 */
class UsuarioController extends AbstractController
{
    /**
     * @Route("/usuario", name="usuario_novo")
     */
    public function novoUsuario(Request $request)
    {
        $usuario = new Usuario();
        $form = $this->createForm(UsuarioType::class, $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $usuario = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('usuario_cadastro.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/listar-usuarios", name="listar-usuarios")
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
     * @Route("/editar-usuario/{id}", name="editar-usuario")
     */
    public function editarUsuario(int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository(Usuario::class)->find($id);

        $form = $this->createForm(UsuarioType::class, $usuario);

        return $this->render('usuario_cadastro.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
