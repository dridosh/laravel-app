<?php

    namespace Database\Factories;

    use App\Models\Article;
    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Str;

    class ArticleFactory extends Factory {
         protected $model = Article::class;

        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition () {
            $title = $this->faker->sentence(6, true);
            $slug = Str::substr(Str::lower(preg_replace('/\s+/', '-', $title)), 0, -1);

            $date_create = $this->faker->dateTimeBetween('-1 years');

            return [
                'title'      => $title,
                'body'       => $this->faker->paragraph(100, true),
                'slug'       => $slug,
                'img'        => 'https://via.placeholder.com/600/5F132A/FFFFFF/?text=LARAVEL:9.*',
                'created_at' => $date_create,
                'published_at' => Carbon::parse($date_create)->addDays(random_int(1, Carbon::now()->diffInDays($date_create))),
        ];
    }
    }
