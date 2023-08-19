<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Service\ContactServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ContactController.
 */
#[Route('/contact')]
class ContactController extends AbstractController
{
    /**
     * Contact service.
     */
    private ContactServiceInterface $contactService;

    /**
     * Constructor.
     */
    public function __construct(ContactServiceInterface $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * Index action.
     *
     * @param Request $request HTTP Request
     *
     * @return Response HTTP response
     */
    #[Route(name: 'contact_index', methods: 'GET')]
    public function index(Request $request): Response
    {
        $pagination = $this->contactService->getPaginatedList(
            $request->query->getInt('page', 1)
        );

        return $this->render('contact/index.html.twig', ['pagination' => $pagination]);
    }

    /**
     * Show action.
     *
     * @param Contact $contact Contact
     *
     * @return Response HTTP response
     */
    #[Route(
        '/{id}',
        name: 'contact_show',
        requirements: ['id' => '[1-9]\d*'],
        methods: 'GET'
    )]
    public function show(Contact $contact): Response
    {
        return $this->render('contact/show.html.twig', ['contact' => $contact]);
    }
}
