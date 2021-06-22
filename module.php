<?php

/**
 * Example module.
 */

declare(strict_types=1);

namespace ExampleNamespace;

require __DIR__ . '/ExampleModule.php';

// This script must return an object that implements ModuleCustomInterface.
// If the module's constructor does not take any parameters, you can simply instantiate it.
//
// If you are using dependency-injection in your module, you would ask webtrees to make the object for you.
// return Webtrees::make(ExampleModule::class);
// For an example, see the server-config module.

return new ExampleModule();
