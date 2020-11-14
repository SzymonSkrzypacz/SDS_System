<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =
            [
                [
                    'id' => 1,
                    'username' => 'admin',
                    'email' => 'admin@example.com',
                    'email_verified_at' => Carbon::createFromDate(2020, 10, 10)->toDateTimeString(),
                    'password' => Hash::make('Testowe1'),
                    'role_id' => '1',

                ],
                [
                    'id' => 2,
                    'username' => 'testowe',
                    'email' => 'testowe@example.com',
                    'email_verified_at' => Carbon::createFromDate(2010, 10, 10)->toDateTimeString(),
                    'password' => Hash::make('Testowe1'),
                    'role_id' => '2',

                ],
                [
                    'id' => 3,
                    'username' => 'supertest',
                    'email' => 'supertest@example.com',
                    'email_verified_at' => Carbon::createFromDate(2020, 10, 10)->toDateTimeString(),
                    'password' => Hash::make('Testowe1'),
                    'role_id' => '2',

                ],
                [
                    'id' => 4,
                    'username' => 'zwykly',
                    'email' => 'niezwykly@example.com',
                    'email_verified_at' => Carbon::createFromDate(2020, 10, 10)->toDateTimeString(),
                    'password' => Hash::make('Testowe1'),
                    'role_id' => '2',

                ],


            ];
        foreach ($data as $row) {
            $model = User::firstOrNew(["id" => $row["id"]]);
            $model->fill($row);
            $model->save();
        }
    }
}
