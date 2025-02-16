<?php

namespace Database\Seeders;

use App\Models\Translation;
use Illuminate\Database\Seeder;

class TranslationsTableSeeder extends Seeder
{
    public function run()
    {
         Translation::factory()->count(50)->withTags()->create();
    }
}