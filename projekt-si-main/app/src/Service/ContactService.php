<?php
/**
 * Contact service.
 */

namespace App\Service;

use App\Entity\Category;
use App\Repository\ContactRepository;
use App\Entity\Contact;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\NonUniqueResultException;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Class ContactService.
 */
class ContactService implements ContactServiceInterface
{
    /**
     * Event repository.
     */
    private ContactRepository $contactRepository;

    /**
     * Paginator.
     */
    private PaginatorInterface $paginator;

    /**
     * Constructor.
     *
     * @param ContactRepository    $contactRepository Contact repository
     * @param PaginatorInterface $paginator      Paginator
     */
    public function __construct(ContactRepository $contactRepository, PaginatorInterface $paginator)
    {
        $this->contactRepository = $contactRepository;
        $this->paginator = $paginator;
    }

    /**
     * Get paginated list of contacts.
     *
     * @param int $page Page number
     *
     * @return PaginationInterface<string, mixed> Paginated list of contacts
     */
    public function getPaginatedList(int $page): PaginationInterface
    {
        return $this->paginator->paginate(
            $this->contactRepository->queryAll(),
            $page,
            ContactRepository::PAGINATOR_ITEMS_PER_PAGE
        );
    }

    /**
     * Delete entity.
     *
     * @param Contact $contact Contact entity
     */
    public function delete(Contact $contact): void
    {
        $this->contactRepository->delete($contact);
    }

    /**
     * Save entity.
     *
     * @param Contact $contact Contact entity
     */
    public function save(Contact $contact): void
    {
        if (null == $contact->getId()) {
            $contact->setCreatedAt(new \DateTimeImmutable());
        }
        $contact->setUpdatedAt(new \DateTimeImmutable());

        $this->contactRepository->save($contact);
    }




}