<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddCollumnUsers extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {

        $this->table('users')
            ->addColumn('datedenaissance', 'string', [
                'after' => 'password',
                'default' => null,
                'length' => 255,
                'null' => true,
            ])
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {

        $this->table('users')
            ->removeColumn('datedenaissance')
            ->update();
    }
}
