<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $data =
            [
                [
                    'id' => 1,
                    'description' => 'admin',

                ],

                [
                    'id' => 2,
                    'description' => 'user',
                ],

                [
                    'id' => 3,
                    'description' => 'privilegedUser',
                ],
                [
                    'id' => 4,
                    'description' => 'bannedUser',
                ],

            ];
        foreach ($data as $row) {
            $model = Role::firstOrNew(["id" => $row["id"]]);
            $model->fill($row);
            $model->save();
        }
    }
}
