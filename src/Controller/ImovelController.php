<?php

/**
 * Classe controller do imóvel
 */
namespace App\Controller;


use App\Entity\Imovel;
use App\Forms\ImovelType;
use App\Repository\ImovelRepository;
use App\Services\ImovelServices;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ImovelController extends AbstractController
{

    /**
     * @Route("/imovel/cadastro", name="cadasto_imovel")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function cadastroImovel(Request $request, ImovelServices $imovelServices)
    {

        $imovel = new Imovel();
        $form = $this->createForm(ImovelType::class, $imovel);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $imovel = $form->getData();
            $imovelServices->salvar($imovel);

            return $this->redirectToRoute('index');
        }

        return $this->render('imovel_cadastro.html.twig', [
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/imovel/listar", name="listar_imoveis")
     */
    public function listarImoveis()
    {
        $em = $this->getDoctrine()->getManager();
        $imoveis = $em->getRepository(Imovel::class)->findAll();

        return $this->render('listar_imoveis.html.twig', [
            'imoveis' => $imoveis
        ]);
    }

    /**
     * @Route("/imovel/{id}", name="editar_imovel")
     */
    public function editarImovel(int $id, Request $request, ImovelServices $imovelServices)
    {
        $em = $this->getDoctrine()->getManager();
        $imovel = $em->getRepository(Imovel::class)->find($id);

        if (!$imovel) {
            throw new \Exception('Imovel não encontrado');
        }

        $form = $this->createForm(ImovelType::class, $imovel);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $imovel = $form->getData();
            $imovelServices->salvar($imovel);

            return $this->redirectToRoute('listar_imoveis');
        }

        return $this->render('imovel_cadastro.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/imovel/portifolios", name="listar_portifolios")
     */
    public function imoveisPortifolios()
    {
        $em = $this->getDoctrine()->getManager();
        $imoveis = $em->getRepository(Imovel::class)->findAll();

        return $this->render('listar_portifolios.html.twig', [
            'imoveis' => $imoveis
        ]);
    }

    /**
     * @Route("/imovel/visualizar/{id}", name="imovel_visualizar")
     */
    public function imovelVisualizar(Request $request)
    {
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $imovel = $em->getRepository(Imovel::class)->find($id);

        return $this->render('imovel_visualizar.html.twig', [
            'imovel' => $imovel
        ]);
    }

    /**
     * @Route("/deletar/{id}", name="deletar_imovel")
     */
    public function deletarIMovel(int $id, ImovelServices $imovelServices)
    {
        $imovelServices->deletar($id);
        $this->addFlash('success', 'Imovel de id:'.$id.' deletado com sucesso!!!');

        return $this->redirectToRoute('listar_imoveis');
    }

}