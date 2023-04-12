<?php

namespace E2ateam\Shared\Tests\Event;

use E2ateam\Shared\Event\Event;
use E2ateam\Shared\Event\EventDispatcher;
use E2ateam\Shared\Event\EventHandlerInterface;
use PHPUnit\Framework\TestCase;

class EventDispatcherTest extends TestCase
{
    public function testShouldRegisterAnEventHandler(): void
    {
        $eventDispatcher = new EventDispatcher();
        $eventHandler = new MockCreateEventHandler();

        $eventDispatcher->register('CreatedEvent', $eventHandler);
        $dispatcher = $eventDispatcher->getEventHandler('CreatedEvent');

        $this->assertEquals(
            true,
            isset($dispatcher),
        );
        $this->assertCount(
            1,
            $eventDispatcher->getEventHandler('CreatedEvent'),
        );
        $this->assertSame(
            $eventHandler,
            $eventDispatcher->getEventHandler('CreatedEvent')[0],
        );
    }

    public function testShouldUnregisterAnEventHandler(): void
    {
        $eventDispatcher = new EventDispatcher();
        $eventHandler = new MockCreateEventHandler();

        $eventDispatcher->register('CreatedEvent', $eventHandler);

        $this->assertSame(
            $eventHandler,
            $eventDispatcher->getEventHandler('CreatedEvent')[0],
        );

        $eventDispatcher->unregister('CreatedEvent', $eventHandler);
        $dispatcher = $eventDispatcher->getEventHandler('CreatedEvent');

        $this->assertEquals(
            true,
            isset($dispatcher)
        );

        $this->assertCount(
            0,
            $eventDispatcher->getEventHandler('CreatedEvent'),
        );
    }

    public function testShouldUnregisterAllEventHandler(): void
    {
        $eventDispatcher = new EventDispatcher();
        $eventHandler = new MockCreateEventHandler();

        $eventDispatcher->register('CreatedEvent', $eventHandler);

        $this->assertSame(
            $eventHandler,
            $eventDispatcher->getEventHandler('CreatedEvent')[0],
        );

        $eventDispatcher->unregisterAll();
        $dispatcher = $eventDispatcher->getEventHandler('CreatedEvent');

        $this->assertEquals(
            false,
            isset($dispatcher)
        );
    }

    public function testShouldNotifyAllEventHandlers(): void
    {
        $event = new CreatedEvent([
            'name' => 'Product 1',
            'description' => 'Product 1 description',
            'price' => 10,
        ]);

        $this->assertNotEmpty($event->getEvent()->getDateTimeOccurred());
        $this->assertNotEmpty($event->getEvent()->getEventData());

        $mock = $this->getMockBuilder(EventHandlerInterface::class)
            ->onlyMethods(['handle'])
            ->getMock();

        $mock->expects($this->once())
            ->method('handle')
            ->with($event);

        $eventDispatcher = new EventDispatcher();
        $eventHandler = new MockCreateEventHandler($mock);

        $eventDispatcher->register('CreatedEvent', $eventHandler);
        $this->assertSame(
            $eventHandler,
            $eventDispatcher->getEventHandler('CreatedEvent')[0],
        );
        $eventDispatcher->notify($event);
    }
}

class CreatedEvent
{
    private Event $event;

    public function __construct($eventData)
    {
        $this->event = new Event($eventData);
    }

    public function getEvent(): Event
    {
        return $this->event;
    }
}

class MockCreateEventHandler implements EventHandlerInterface
{
    protected $observers = [];

    public function __construct($observer = null)
    {
        $this->observers[] = $observer;
    }

    public function handle($event): void
    {
        $this->spyOn($event);
    }

    private function spyOn($argument)
    {
        foreach ($this->observers as $observer) {
            $observer->handle($argument);
        }
    }
}
