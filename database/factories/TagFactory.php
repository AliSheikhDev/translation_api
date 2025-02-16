<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition(): array
    {
        $word = $this->faker->unique()->word;
        if (!Tag::where('name',$word)->exists()) {
            # code...
            return [
                'name' => $word,
            ];
        }
        return [];
    }
}
