my127 FSM
=========
A Simple FSM library written in PHP.

**Note:** This project is in the early stages with no pinned releases and frequent API changes.

[![Build Status](https://travis-ci.org/my127Library/my127.svg?branch=master)](https://travis-ci.org/my127Library/my127)

Getting started
---------------

### Installation (via composer)
```js
{
      "require": {
        "my127/fsm": "dev-master@dev"
    }
}
```
### Example Usage

```php
use my127\FSM\Definition;

$light = new Definition('Dimmable Light');

$light->addTransition('brighter', 'off',    'low');
$light->addTransition('brighter', 'low',    'medium');
$light->addTransition('brighter', 'medium', 'high');
$light->addTransition('brighter', 'high',   'high');

$light->addTransition('dimmer', 'high',   'medium');
$light->addTransition('dimmer', 'medium', 'low');
$light->addTransition('dimmer', 'low',    'off');
$light->addTransition('dimmer', 'off',    'off');

$kitchenLight = $light->toFSM();

echo $kitchenLight('brigher')."\n";
echo $kitchenLight('brigher')."\n";
echo $kitchenLight('brigher')."\n";

echo $kitchenLight('dimmer')."\n";
echo $kitchenLight('dimmer')."\n";
echo $kitchenLight('dimmer')."\n";

echo 'current state: '.$kitchenLight->getCurrentState();

```

The above example will output:

```
low
medium
high
medium
low
off
current state: off
```