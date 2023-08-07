<?php
/**
 * Event service interface.
 */

namespace App\Service;

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
    public function getPaginatedList(int $page): PaginationInterface;

    /**
     * Get upcoming events.
     *
     * @param int|null $limit Maximum number of upcoming events to retrieve
     *
     * @return array Array of upcoming events
     */
    public function getUpcomingEvents(?int $limit = null): array;

    /**
     * Get past events.
     *
     * @param int|null $limit Maximum number of past events to retrieve
     *
     * @return array Array of past events
     */
    public function getPastEvents(?int $limit = null): array;
}
