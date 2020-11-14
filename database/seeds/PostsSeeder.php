<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsSeeder extends Seeder
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
                'author_id' => 1,
                'title' => 'Super materiały budowlane',
                'slug' => 'super-materialy-budowlane',
                'body' => '
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean augue dolor, volutpat non erat vitae, auctor gravida arcu. Duis bibendum odio non quam porta, et convallis tortor convallis. Phasellus pellentesque libero vitae eros egestas, elementum tincidunt felis tincidunt. Curabitur lectus leo, aliquet sed condimentum non, commodo quis elit. Morbi pretium fringilla felis a accumsan. Etiam placerat vulputate elementum. Curabitur ut iaculis felis. Cras egestas sem eu auctor accumsan. Vestibulum tincidunt sollicitudin urna sit amet gravida.

                Quisque nec odio condimentum, pretium sapien eget, pretium felis. Aenean a nulla ac ex euismod euismod. Etiam aliquet, lectus vitae vehicula tincidunt, est magna viverra tortor, blandit viverra risus orci sit amet nibh. Vestibulum vitae dolor non nulla pharetra sollicitudin sed sagittis tellus. Phasellus eu posuere turpis. Cras posuere id quam a mattis. Praesent laoreet dapibus felis sit amet porttitor. Suspendisse quis erat venenatis, sollicitudin odio et, interdum ex.',

            ],

            [
                'id' => 2,
                'author_id' => 1,
                'title' => 'Dobra farba firmy XYZ',
                'slug' =>'dobra-farba-firmy-xyz',
                'body' => '
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean augue dolor, volutpat non erat vitae, auctor gravida arcu. Duis bibendum odio non quam porta, et convallis tortor convallis. Phasellus pellentesque libero vitae eros egestas, elementum tincidunt felis tincidunt. Curabitur lectus leo, aliquet sed condimentum non, commodo quis elit. Morbi pretium fringilla felis a accumsan. Etiam placerat vulputate elementum. Curabitur ut iaculis felis. Cras egestas sem eu auctor accumsan. Vestibulum tincidunt sollicitudin urna sit amet gravida.

                Quisque nec odio condimentum, pretium sapien eget, pretium felis. Aenean a nulla ac ex euismod euismod. Etiam aliquet, lectus vitae vehicula tincidunt, est magna viverra tortor, blandit viverra risus orci sit amet nibh. Vestibulum vitae dolor non nulla pharetra sollicitudin sed sagittis tellus. Phasellus eu posuere turpis. Cras posuere id quam a mattis. Praesent laoreet dapibus felis sit amet porttitor. Suspendisse quis erat venenatis, sollicitudin odio et, interdum ex.',
            ],

        ];
    foreach($data as $row) {
        $model = Post::firstOrNew(["id" => $row["id"]]);
        $model->fill($row);
        $model->save();
    }
    }
}
