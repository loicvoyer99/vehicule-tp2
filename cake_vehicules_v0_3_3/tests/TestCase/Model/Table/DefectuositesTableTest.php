<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DefectuositesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DefectuositesTable Test Case
 */
class DefectuositesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DefectuositesTable
     */
    public $Defectuosites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Defectuosites',
        'app.Vehicules'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Defectuosites') ? [] : ['className' => DefectuositesTable::class];
        $this->Defectuosites = TableRegistry::getTableLocator()->get('Defectuosites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Defectuosites);

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
