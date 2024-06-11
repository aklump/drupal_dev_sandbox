<?php

/** @var string $command */
/** @var string $book_path */
/** @var \Symfony\Component\EventDispatcher\EventDispatcher $dispatcher */

use AKlump\Knowledge\Events\GetVariables;

$dispatcher->addListener(GetVariables::NAME, function (GetVariables $event) {
});
