<?php
declare(strict_types=1);

namespace AzureTranslator\Test\TestCase\Controller;

use AzureTranslator\Controller\TranslationsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * AzureTranslator\Controller\TranslationsController Test Case
 *
 * @uses \AzureTranslator\Controller\TranslationsController
 */
class TranslationsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'plugin.AzureTranslator.Translations',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testTranslate(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
    
}
