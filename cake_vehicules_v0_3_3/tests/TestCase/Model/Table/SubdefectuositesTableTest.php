<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubdefectuositesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubdefectuositesTable Test Case
 */
class SubdefectuositesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SubdefectuositesTable
     */
    public $Subdefectuosites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Subdefectuosites',
        'app.Defectuosites'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Subdefectuosites') ? [] : ['className' => SubdefectuositesTable::class];
        $this->Subdefectuosites = TableRegistry::getTableLocator()->get('Subdefectuosites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Subdefectuosites);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
