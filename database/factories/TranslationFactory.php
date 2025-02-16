<?php

namespace Database\Factories;

use App\Models\Translation;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TranslationFactory extends Factory
{
    protected $model = Translation::class;

    public function definition(): array
    {
        return [
            'locale' => $this->faker->randomElement(['en', 'fr', 'es']),
            'key' => $this->faker->unique(true, 20000)->word,
            'content' => $this->faker->sentence,
        ];
    }

    public function withTags(int $count = 3)
    {
        return $this->afterCreating(function (Translation $translation) use ($count) {
            
            $tags = Tag::factory()->count($count)->create();

            foreach ($tags as $tag) {
                $translation->tags()->attach($tag->id);
            }
        });
    }
}