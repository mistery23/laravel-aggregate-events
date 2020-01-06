# Laravel value objects

## Install
```
composer require mistery23/laravel-aggregate-events
```
Features
---
Add domain events to your entity. Record your event and release.
---

Using
---
```php
use Mistery23\AggregateEvents\EventTrait;

class User extends Model implements AggregateEventRoot 
{
    use EventTrait;

    public static function signUp(
        Id   $id,
        Name $name,
            ...
    ): self {
        $user = new self();
       
        $user->id            = $id;
        $user->name          = $name;               
           ...
       
        $user->recordEvent(new UserSignupedEvent($user));
    
        return $user;
    }
 }
```
---
And release events
```php

use Mistery23\AggregateEvents\EventDispatcher;

class UserRepository
{

    private $dispatcher;


    /**
     * UserRepository constructor.
     *
     * @param EventDispatcher $dispatcher
     */
    public function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * Add user
     *
     * @param Model $user
     *
     * @return void
     *
     * @throws \RuntimeException
     */
    public function add(Model $user): void
    {
        if (false === $user->save()) {
            throw new \RuntimeException('Save error.');
        }

        $this->dispatcher->dispatchAll($user->releaseEvents());
    }
}
```
---
License
---
This package is free software distributed under the terms of the [MIT license](https://opensource.org/licenses/MIT). Enjoy!
