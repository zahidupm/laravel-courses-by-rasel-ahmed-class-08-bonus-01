<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Series;
use App\Models\Topic;
use App\Models\Platform;
use App\Models\User;
use App\Models\Course;
use App\Models\Author;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $series = ['PHP', 'JavaScript', 'WordPress', 'Laravel'];
        foreach($series as $item) {
            Series::create([
                'name' => $item,
            ]);
        }

        $topics = ['Eloquent', 'Validation', 'Authentication', 'Testing', 'Refactoring'];
        foreach($topics as $topic) {
            Topic::create([
                'name' => $topic,
            ]);
        }

        $platforms = ['Laracasts', 'Youtube', 'Larajobs', 'Laravel NEws', 'Laracasts Forum'];
        foreach($platforms as $item) {
            Platform::create([
                'name' => $item,
            ]);
        }

        $authors = ['Zahid Hasan', 'Another Name', 'Larajobs'];
        foreach($authors as $item) {
            Author::create([
                'name' => $item,
            ]);
        }

        // create 50 users
        User::factory(50)->create();

        // create 10 courses
        Course::factory(100)->create();

        // multiple relation
        // $courses = Course::all();
        // foreach($courses as $course) {
        //     $loop = rand(1, 5);
        //     for($i = 0; $i < $loop; $i++) {
        //         $random_topic_id = Topic::all()->random()->id;
        //         if($course->topics->contains($random_topic_id)) {
        //             $course->topics()->attach($random_topic_id);
        //         }
        //     }
        // }

        $courses = Course::all();
        foreach($courses as $course) {
            $topics = Topic::all()->random(rand(1, 5))->pluck('id')->toArray();
            $course->topics()->attach($topics);

            $authors = Author::all()->random(rand(1, 3))->pluck('id')->toArray();
            $course->authors()->attach($authors);
        }

    }
}
