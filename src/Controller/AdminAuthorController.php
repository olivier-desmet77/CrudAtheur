<?php

namespace App\Controller;

use App\Form\AuthorType;
use App\Repository\AuthorRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminAuthorController extends AbstractController
{

    ////// Methode permettant de créer un nouvel auteur
    #[Route('/admin/auteur/nouveau', name: 'app_admin_author_create')]
    public function create(Request $request, AuthorRepository $repository): Response
    {
        // Création du formulaire
        $form = $this -> createForm(AuthorType::class);
        // Remplir le formulaire avec les donnée de saisie
        $form->handleRequest($request);
        // Test si le formulaire envoyé et validé
        if ($form -> isSubmitted() && $form -> isValid() ){
            // Récupèration de l'auteur dans le formulaire
            $Author = $form
                ->getData()
                ->setCreatedAt(new DateTime())
                ->setUpdateAt(new DateTime());
        // Enregistrer l'auteur dans la base de donnée
        $repository->save($Author, true);
        // Rediriger vers la liste des autheurs
        return $this->redirectToRoute('app_admin_author_list');
        
        }
    }
    //Afficher la page de creation d'un livre
    return $this->render('admin_author/create.html.twig', [
        'controller_name' => 'AdminAuthorController',
    ]);

    ////// Liste de tous les autheurs
    #[Route('/admin/auteur', name: 'app_admin_author_list')]
    public function list(AuthorRepository $repository): Response
    {
        // Récupérer tous les auteurs de la base de donnée
        $Author = $repository -> findAll();
        // Afficher la liste de autheurs
        return $this -> render('admin_author/list.html.twig',[
            // Envoyer les auteurs à twig
            'authors' => $Authors,
        ]);
    }

    ///// Mise à jour des autheurs
    #[Route('/admin/auteurs/{id}', name: 'app_admin_author_update')]
    public function update(Author $author, Request $request, AuthorRepository $repository): Response
    {
       // Création du formulaire
       $form = $this -> createForm(AuthorType::class);
       // Remplir le formulaire avec les donnée de saisie
       $form->handleRequest($request);
       // Test si le formulaire envoyé et validé
        if ($form -> isSubmitted() && $form -> isValid()) {
        // Enregistrer l'autheur dans la base de données
         $repository -> save($author -> setUpdateAt(new DateTime()), true);
         // Rediriger vers la liste des livres
        return $this->redirectToRoute('app-admin_author_list');
       } 
    // Afficher la page de mise à jour
    return $this->render('admin_author/update.html.twig',[
        'form' => createView(),
    ]);
    }

    ///// Supprimer un autheur de la BDD
    #[Route('/admin/auteurs/{id}/supprimer', name: 'app_admin_author_remove')]
    public function remove(Author $author, AuthorRepository $repository): Response
    {
        $repository-> remove($author,true);
        // Rediriger vers la liste des autheurs
        return $this->redirectToRoute('app_admin_author_list');

    }









}
