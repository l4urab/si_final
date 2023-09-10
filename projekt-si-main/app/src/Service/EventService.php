<?php
/**
 * Event service.
 */

namespace App\Service;
use App\Entity\Event;
use App\Entity\Contact;
use App\Repository\EventRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * Class EventService.
 */
class EventService implements EventServiceInterface
{
    /**
     * Event repository.
     */
    private EventRepository $eventRepository;

    /**
     * Paginator.
     */
    private PaginatorInterface $paginator;

    /**
     * Constructor.
     *
     * @param EventRepository    $eventRepository Event repository
     * @param PaginatorInterface $paginator      Paginator
     */
    public function __construct(EventRepository $eventRepository, PaginatorInterface $paginator)
    {
        $this->eventRepository = $eventRepository;
        $this->paginator = $paginator;
    }

    /**
     * Get paginated list of events.
     *
     * @param int $page Page number
     *
     * @return PaginationInterface<string, mixed> Paginated list of events
     */
    public function getPaginatedList(int $page): PaginationInterface
    {
        return $this->paginator->paginate(
            $this->eventRepository->queryAll(),
            $page,
            EventRepository::PAGINATOR_ITEMS_PER_PAGE
        );
    }

    /**
     * Get upcoming events.
     *
     * @param int|null $limit Maximum number of upcoming events to retrieve
     *
     * @return array Array of upcoming events
     */
    public function getUpcomingEvents(?int $limit = null): array
    {
        return $this->eventRepository->findUpcomingEvents($limit);
    }

    /**
     * Get past events.
     *
     * @param int|null $limit Maximum number of past events to retrieve
     *
     * @return array Array of past events
     */
    public function getPastEvents(?int $limit = null): array
    {
        return $this->eventRepository->findPastEvents($limit);
    }

    /**
     * Save entity.
     *
     * @param Event $event Event entity
     */
    public function save(Event $event): void
    {
        if (null == $event->getId()) {
            $event->setCreatedAt(new \DateTimeImmutable());
        }
        $event->setUpdatedAt(new \DateTimeImmutable());

        $this->eventRepository->save($event);
    }

    /**
     * Delete entity.
     *
     * @param Event $event Event entity
     */
    public function delete(Event $event): void
    {
        $this->eventRepository->delete($event);
    }
}
