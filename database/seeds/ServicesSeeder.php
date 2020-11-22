<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesSeeder extends Seeder
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
                    'name' => 'Usługi budowlane',

                ],

                [
                    'id' => 2,
                    'name' => 'Usługi malarskie',
                ],

                [
                    'id' => 3,
                    'name' => 'Usługi montażowe',
                ],
                [
                    'id' => 4,
                    'name' => 'Usługi murarsko-tynkarskie',
                ],
                [
                    'id' => 5,
                    'name' => 'Usługi parkieciarskie',
                ],
                [
                    'id' => 6,
                    'name' => 'Usługi wykończeniowe',
                ],
                [
                    'id' => 7,
                    'name' => 'Usługi remontowe',
                ],

            ];
        foreach ($data as $row) {
            $model = Service::firstOrNew(["id" => $row["id"]]);
            $model->fill($row);
            $model->save();
        }
    }
}
