<?php

namespace OxidAcademy\CategoryLogger\Event;

use OxidEsales\Eshop\Application\Model\Category;
use OxidEsales\EshopCommunity\Internal\Framework\Event\AbstractShopAwareEventSubscriber;
use OxidEsales\EshopCommunity\Internal\Transition\ShopEvents\AfterModelInsertEvent;
use OxidEsales\EshopCommunity\Internal\Transition\ShopEvents\AfterModelDeleteEvent;
use OxidEsales\EshopCommunity\Internal\Transition\ShopEvents\AfterModelUpdateEvent;
use Symfony\Component\EventDispatcher\Event;
use Psr\Log\LoggerInterface;

class LoggerEventSubscriber extends AbstractShopAwareEventSubscriber
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function logCreation(Event $event): void
    {
        $model = $event->getModel();

        if ($this->isCategory($model) === true) {
            $this->logger->info('Category with ID ' . $model->getId() . ' was created.');
        }
    }

    public function logDeletion(Event $event): void
    {
        $model = $event->getModel();

        if ($this->isCategory($model) === true) {
            $this->logger->info('Category with ID ' . $model->getId() . ' was deleted.');
        }
    }

    public function logUpdate(Event $event): void
    {
        $model = $event->getModel();

        if ($this->isCategory($model) === true) {
            $this->logger->info('Category with ID ' . $model->getId() . ' was updated.');
        }
    }

    private function isCategory(Object $model): bool
    {
        if (get_class($model) == get_class(oxNew(Category::class))) {
            return true;
        } else {
            return false;
        }
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
