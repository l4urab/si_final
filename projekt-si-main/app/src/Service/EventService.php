<?php
/**
 * Event service.
 */

namespace App\Service;
use App\Entity\User;
use App\Entity\Event;
use App\Entity\Contact;
use App\Repository\EventRepository;
use Doctrine\ORM\NonUniqueResultException;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\Pagination\SlidingPagination;
use Knp\Component\Pager\PaginatorInterface;
use App\Service\CategoryServiceInterface;

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
     * @param CategoryServiceInterface $categoryService Category service
     * @param EventRepository    $eventRepository Event repository
     * @param PaginatorInterface $paginator      Paginator
     */
    public function __construct(
        CategoryServiceInterface $categoryService,
        PaginatorInterface $paginator,
        EventRepository $eventRepository
    ) {
        $this->categoryService = $categoryService;
        $this->paginator = $paginator;
        $this->eventRepository = $eventRepository;
    }

    /**
     * Category service.
     */
    private CategoryServiceInterface $categoryService;

    /**
     * Get paginated list.
     *
     * @param int $page Page number
     * @param User $author Event author
     * @param array<string, int> $filters Filters array
     *
     * @return PaginationInterface<SlidingPagination> Paginated list
     * @throws NonUniqueResultException
     */
    public function getPaginatedList(int $page, User $author, array $filters = []): PaginationInterface
    {
        $filters = $this->prepareFilters($filters);

        return $this->paginator->paginate(
            $this->eventRepository->queryByAuthor($author, $filters),
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

    /**
     * Prepare filters for the events list.
     *
     * @param array<string, int> $filters Raw filters from request
     *
     * @return array<string, object> Result array of filters
     * @throws NonUniqueResultException
     */
    private function prepareFilters(array $filters): array
    {
        $resultFilters = [];
        if (!empty($filters['category_id'])) {
            $category = $this->categoryService->findOneById($filters['category_id']);
            if (null !== $category) {
                $resultFilters['category'] = $category;
            }
        }
        return $resultFilters;
    }
}
