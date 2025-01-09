<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdsTable Test Case
 */
class AdsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdsTable
     */
    protected $Ads;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Ads',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ads') ? [] : ['className' => AdsTable::class];
        $this->Ads = $this->getTableLocator()->get('Ads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ads);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AdsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
