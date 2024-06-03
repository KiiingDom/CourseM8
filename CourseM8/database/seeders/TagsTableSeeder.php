<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => 'Early Morning'],
            ['name' => 'Late Morning'],
            ['name' => 'Afternoon'],
            ['name' => 'Evening'],
            ['name' => 'Library'],
            ['name' => 'Coffee Shop'],
            ['name' => 'Home'],
            ['name' => 'Visual Learner'],
            ['name' => 'Auditory Learner'],
            ['name' => 'Kinesthetic Learner'],
            // Add more tags as needed
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
