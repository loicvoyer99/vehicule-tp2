<?php
use Migrations\AbstractSeed;

/**
 * Files seed.
 */
class FilesSeed extends AbstractSeed
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
                'id' => '7',
                'name' => 'image.jpg',
                'path' => 'uploads/files/',
                'created' => '2019-09-16 15:00:25',
                'modified' => '2019-09-16 15:00:25',
                'status' => '1',
            ],
            [
                'id' => '8',
                'name' => 'artiste4.jpg',
                'path' => 'uploads/files/',
                'created' => '2019-09-25 15:04:32',
                'modified' => '2019-09-25 15:04:32',
                'status' => '1',
            ],
        ];

        $table = $this->table('files');
        $table->insert($data)->save();
    }
}
