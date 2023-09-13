<?php
/**
 * Contact service interface.
 */

namespace App\Service;

use App\Entity\Contact;
use Knp\Component\Pager\Pagination\PaginationInterface;

/**
 * Interface ContactServiceInterface.
 */
interface ContactServiceInterface
{
    /**
     * Get paginated list of contacts.
     *
     * @param int $page Page number
     *
     * @return PaginationInterface<string, mixed> Paginated list of events
     */
    public function getPaginatedList(int $page): PaginationInterface;


    /**
     * Delete entity.
     *
     * @param Contact $contact Contact entity
     */
    public function delete(Contact $contact): void;

    /**
     * Save entity.
     *
     * @param Contact $contact Contact entity
     */
}
