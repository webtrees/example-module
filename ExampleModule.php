<?php

/**
 * Example module.
 */

declare(strict_types=1);

namespace ExampleNamespace;

use Fisharebest\Localization\Translation;
use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;

/**
 * Class ExampleModule
 *
 * This example shows how to create a custom module.
 * All the functions are optional.  Just implement the ones you need.
 *
 * Modules *must* implement ModuleCustomInterface.  They *may* also implement other interfaces.
 */
class ExampleModule extends AbstractModule implements ModuleCustomInterface
{
    // For every module interface that is implemented, the corresponding trait *should* also use be used.
    use ModuleCustomTrait;

    /**
     * The constructor is called on all modules, even ones that are disabled.
     * Note that you cannot rely on other modules (such as languages) here, as they may not yet exist.
     *
     */
    public function __construct()
    {
    }

    /**
     * Bootstrap.  This function is called on *enabled* modules.
     * It is a good place to register routes and views.
     * Note that it is only called on genealogy pages - not on admin pages.
     *
     * @return void
     */
    public function boot(): void
    {
    }

    /**
     * How should this module be identified in the control panel, etc.?
     *
     * @return string
     */
    public function title(): string
    {
        return I18N::translate('Example module');
    }

    /**
     * A sentence describing what this module does.
     *
     * @return string
     */
    public function description(): string
    {
        return I18N::translate('This module does not do anything');
    }

    /**
     * The person or organisation who created this module.
     *
     * @return string
     */
    public function customModuleAuthorName(): string
    {
        return 'Greg Roach';
    }

    /**
     * The version of this module.
     *
     * @return string
     */
    public function customModuleVersion(): string
    {
        return '1.0.0';
    }

    /**
     * A URL that will provide the latest version of this module.
     *
     * @return string
     */
    public function customModuleLatestVersionUrl(): string
    {
        return 'https://github.com/webtrees/example-module/raw/main/latest-version.txt';
    }

    /**
     * Where to get support for this module.  Perhaps a github repository?
     *
     * @return string
     */
    public function customModuleSupportUrl(): string
    {
        return 'https://github.com/webtrees/example-module';
    }

    /**
     * Additional/updated translations.
     *
     * @param string $language
     *
     * @return array<string>
     */
    public function customTranslations(string $language): array
    {
        switch ($language) {
            case 'en-AU':
            case 'en-GB':
            case 'en-US':
                // Note the special characters used in plural and context-sensitive translations.
                return [
                    'Individual'                                      => 'Fish',
                    'Individuals'                                     => 'Fishes',
                    '%s individual' . I18N::PLURAL . '%s individuals' => '%s fish' . I18N::PLURAL . '%s fishes',
                    'Unknown given name' . I18N::CONTEXT . '…'        => '?fish?',
                    'Unknown surname' . I18N::CONTEXT . '…'           => '?FISH?',
                ];

            case 'fr':
            case 'fr-CA':
                return [
                    // These are new translations:
                    'Example module'                                  => 'Exemple module',
                    'This module does not do anything'                => 'Ce module ne fait rien',
                    // These are updates to existing translations:
                    'Individual'                                      => 'Poisson',
                    'Individuals'                                     => 'Poissons',
                    '%s individual' . I18N::PLURAL . '%s individuals' => '%s poisson' . I18N::PLURAL . '%s poissons',
                    'Unknown given name' . I18N::CONTEXT . '…'        => '?poission?',
                    'Unknown surname' . I18N::CONTEXT . '…'           => '?POISSON?',
                ];

            case 'some-other-language':
                // Arrays are preferred, and are faster.
                // If your module uses .MO files, then you can convert them to arrays like this.
                return (new Translation('path/to/file.mo'))->asArray();

            default:
                return [];
        }
    }
}
