<?php
use Migrations\AbstractSeed;

/**
 * Defectuosites seed.
 */
class DefectuositesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '2',
                'description' => 'changer pneus honda modifié 2x',
                'slug' => 'changer pneus modifié',
                'created' => '2019-09-06 15:24:45',
                'modified' => '2019-09-06 15:59:14',
            ],
            [
                'id' => '4',
                'description' => 'abc',
                'slug' => '8',
                'created' => '2019-09-10 16:29:27',
                'modified' => '2019-09-10 16:29:27',
            ],
            [
                'id' => '5',
                'description' => '',
                'slug' => 'huile',
                'created' => '2019-10-02 00:29:26',
                'modified' => '2019-10-02 00:29:26',
            ],
        ];

        $table = $this->table('defectuosites');
        $table->insert($data)->save();
    }
}
