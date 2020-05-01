<?php
declare(strict_types=1);

namespace AzureTranslator\Test\TestCase\Controller\Component;

use AzureTranslator\Controller\Component\TranslationComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * AzureTranslator\Controller\Component\TranslationComponent Test Case
 */
class TranslationComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \AzureTranslator\Controller\Component\TranslationComponent
     */
    protected $Translation;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Translation = new TranslationComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void {
        unset($this->Translation);

        parent::tearDown();
    }

    public function testTranslate(): void {
        $this->assertEquals('success', json_decode($this->Translation->translate('Lorem Ipsum', 'en'), true)['status']);
    }
}
