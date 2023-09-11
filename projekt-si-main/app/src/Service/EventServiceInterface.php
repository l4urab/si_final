<?php
/**
 * Event service interface.
 */

namespace App\Service;
use App\Entity\User;
use App\Entity\Event;
use Knp\Component\Pager\Pagination\PaginationInterface;

/**
 * Interface EventServiceInterface.
 */
interface EventServiceInterface
{
    /**
     * Get paginated list of events.
     *
     * @param int $page Page number
     *
     * @return PaginationInterface<string, mixed> Paginated list of events
     */
    public function getPaginatedList(int $page, User $author, array $filters = []): PaginationInterface;

    /**
     * Get upcoming events.
     *
     * @param int|null $limit Maximum number of upcoming events to retrieve
     *
     * @return array Array of upcoming events
     */
    public function getUpcomingEvents(?int $limit = null): array;


    /**
     * Save entity.
     *
     * @param Event $event Event entity
     */

    /**
     * Delete entity.
     *
     * @param Event $event Event entity
     */
    public function delete(Event $event): void;


}
