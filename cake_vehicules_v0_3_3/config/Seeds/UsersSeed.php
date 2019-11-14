<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'id' => '0',
                'user_id' => '0',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$jeVb3axnvLaTKoMEGJF.3.a2b6H1n8po9kvhnmq9qbe.eFovc73j2',
                'role' => 'admin',
                'created' => '2019-09-05 15:24:15',
                'modified' => '2019-09-05 15:24:15',
            ],
            [
                'id' => '1',
                'user_id' => '0',
                'username' => 'fake admin',
                'email' => 'admin@hotmail.com',
                'password' => '$2y$10$PQOUsuV6jdxN.pHXqAcSneY2TO2OxqZAYqR50oWthnlRHUYA6Bboi',
                'role' => 'utilisateur',
                'created' => '2019-08-26 00:00:00',
                'modified' => '2019-09-05 15:27:52',
            ],
            [
                'id' => '2',
                'user_id' => '0',
                'username' => 'invite',
                'email' => 'invite@invite.com',
                'password' => '$2y$10$eV.u/v0RB9.rxutu/VruwOWwm4VNGYeF5dailfJTumFDDYS9ie/pS',
                'role' => 'utilisateur',
                'created' => '2019-09-05 13:16:57',
                'modified' => '2019-09-05 13:16:57',
            ],
            [
                'id' => '3',
                'user_id' => '0',
                'username' => 'loic',
                'email' => 'loic@loic.com',
                'password' => '$2y$10$IEsRLX8Ajnem1G0A6X6ghuCk9Lt1C7sjwpd.22y1kTgeuVOZPyGhu',
                'role' => 'utilisateur',
                'created' => '2019-09-05 14:24:13',
                'modified' => '2019-09-05 14:24:13',
            ],
            [
                'id' => '4',
                'user_id' => '0',
                'username' => 'bob',
                'email' => 'bob@bob.com',
                'password' => '$2y$10$6KCoqnhe8KIrJUlkcb8fX.GVmjSI.xaCALiHSWQPbmCs3c6gQy26W',
                'role' => 'utilisateur',
                'created' => NULL,
                'modified' => '2019-09-05 15:27:23',
            ],
            [
                'id' => '5',
                'user_id' => '0',
                'username' => 'aaa',
                'email' => 'a@a.com',
                'password' => '$2y$10$0xSPaH95jZvcja4fTTnP4.r91DFS1lP5LKiv7w7DpNjltKB5HedOa',
                'role' => 'utilisateur',
                'created' => '2019-09-11 17:45:22',
                'modified' => '2019-09-11 17:45:22',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
