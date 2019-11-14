<?php
use Migrations\AbstractSeed;

/**
 * Vehicules seed.
 */
class VehiculesSeed extends AbstractSeed
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
                'id' => '1',
                'marque' => 'honda',
                'modele' => 'fit',
                'slug' => 'fit',
                'created' => '2019-08-26 00:00:00',
                'modified' => '2019-08-26 00:00:00',
                'user_id' => '0',
            ],
            [
                'id' => '2',
                'marque' => 'honda',
                'modele' => 'civic',
                'slug' => 'civic',
                'created' => '2019-09-05 13:02:01',
                'modified' => '2019-09-05 13:02:01',
                'user_id' => '0',
            ],
            [
                'id' => '3',
                'marque' => 'hyundai',
                'modele' => 'elentra',
                'slug' => 'elentra',
                'created' => '2019-09-05 14:14:58',
                'modified' => '2019-09-05 14:14:58',
                'user_id' => '0',
            ],
            [
                'id' => '4',
                'marque' => 'porsche',
                'modele' => '911',
                'slug' => '911',
                'created' => '2019-09-05 14:26:12',
                'modified' => '2019-09-05 14:26:12',
                'user_id' => '0',
            ],
            [
                'id' => '5',
                'marque' => 'marque test admin',
                'modele' => 'modele test admin',
                'slug' => 'modele test admin',
                'created' => '2019-09-06 14:55:38',
                'modified' => '2019-09-06 14:55:38',
                'user_id' => '0',
            ],
        ];

        $table = $this->table('vehicules');
        $table->insert($data)->save();
    }
}
