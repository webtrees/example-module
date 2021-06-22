# EXAMPLE MODULE

This example shows how to create a custom module.

All the functions are optional - edit the ones you need, and
delete those that you do not need.

For example, the functions regarding versions, author, support,
etc. are only relevant for modules that you intend to share publicly.

This module does not actually do anything.  Look at the other examples to
see how to add or change specific features.

## How to extend/modify an existing modules

This example creates a new module from scratch (by extending `AbstractModule`).

Instead, you can extend an existing module.  For example:

```php
<?php
use Fisharebest\Webtrees\Webtrees;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;
use Fisharebest\Webtrees\Module\PedigreeChartModule;

/**
 * Creating an anonymous class will prevent conflicts with other custom modules.
 */
class ExampleModule extends PedigreeChartModule implements ModuleCustomInterface {
    use ModuleCustomTrait;

    /**
     * @return string
     */
    public function description(): string
    {
        return 'A modified version of the pedigree chart';
    }

    // Change the default layout...
    protected const DEFAULT_STYLE = self::STYLE_DOWN;

    protected const DEFAULT_PARAMETERS  = [
        'generations' => self::DEFAULT_GENERATIONS,
        'style'       => self::DEFAULT_STYLE,
    ];
};

// The PedigreeChartModule constructor takes some parameters,
// so we tell webtrees to make them for us.
return Webtrees::make(ExampleModule::class);
```
