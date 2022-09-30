<?php

declare(strict_types = 1);

namespace OxidAcademy\CategoryLogger\Event;

use OxidEsales\Eshop\Application\Model\Category;
use OxidEsales\EshopCommunity\Internal\Framework\Event\AbstractShopAwareEventSubscriber;
use OxidEsales\EshopCommunity\Internal\Transition\ShopEvents\AfterModelInsertEvent;
use OxidEsales\EshopCommunity\Internal\Transition\ShopEvents\AfterModelDeleteEvent;
use OxidEsales\EshopCommunity\Internal\Transition\ShopEvents\AfterModelUpdateEvent;
use Symfony\Component\EventDispatcher\Event;
use Psr\Log\LoggerInterface;
use function get_class;

class LoggerEventSubscriber extends AbstractShopAwareEventSubscriber
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function logCreation(AfterModelInsertEvent $event): void
    {
        $model = $event->getModel();

        if ($this->isCategory($model)) {
            $this->logger->info('Category with ID ' . $model->getId() . ' was created.');
        }
    }

    public function logDeletion(AfterModelDeleteEvent $event): void
    {
        $model = $event->getModel();

        if ($this->isCategory($model)) {
            $this->logger->info('Category with ID ' . $model->getId() . ' was deleted.');
        }
    }

    public function logUpdate(AfterModelUpdateEvent $event): void
    {
        $model = $event->getModel();

        if ($this->isCategory($model)) {
            $this->logger->info('Category with ID ' . $model->getId() . ' was updated.');
        }
    }

    private function isCategory(Object $model): bool
    {
        return get_class($model) === Category::class;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            AfterModelInsertEvent::NAME => 'logCreation',
            AfterModelDeleteEvent::NAME => 'logDeletion',
            AfterModelUpdateEvent::NAME => 'logUpdate',
        ];
    }
}
