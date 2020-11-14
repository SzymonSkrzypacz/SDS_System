<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsSeeder extends Seeder
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
                'id' =>1,
                'post_id' => 1,
                'user_id' => 2,
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean augue dolor, volutpat non erat vitae, auctor gravida arcu. Duis bibendum odio non quam porta, et convallis tortor convallis. '

            ],

            [
                'id' =>2,
                'post_id' => 2,
                'user_id' => 3,
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean augue dolor, volutpat non erat vitae, auctor gravida arcu. Duis bibendum odio non quam porta, et convallis tortor convallis. '
            ],

            [
                'id' =>3,
                'post_id' => 1,
                'user_id' => 1,
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean augue dolor, volutpat non erat vitae, auctor gravida arcu. Duis bibendum odio non quam porta, et convallis tortor convallis. '

            ],


        ];
    foreach($data as $row) {
        $model = Comment::firstOrNew(["id" => $row["id"]]);
        $model->fill($row);
        $model->save();
    }
    }
}
