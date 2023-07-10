<?php

namespace App\Helpers;

use Faker\Factory as Faker;
use Illuminate\Support\Collection;

class Functions
{
    public static function generate_test_posts(int $count = 1)
    {
        $faker = Faker::create();

        $posts = [];

        for ($n = 0; $n < $count; $n += 1) {
            $posts[] = [
                'id'                => $faker->uuid(),
                'author_id'         => $faker->userName(),
                'author'            => $faker->name(),
                'author_verified'   => $faker->boolean(),
                'content'           => $faker->text(),
                'likes'             => $faker->numberBetween(0, 200),
                'user_liked'        => $faker->boolean(),
                'shares'            => $faker->numberBetween(0, 500),
                'user_shared'       => $faker->boolean(),
                'comments'          => $faker->numberBetween(0, 2000),
                'user_commented'    => $faker->boolean(),
                'views'             => $faker->numberBetween(0, 200000),
                'posted_on'         => $faker->dateTimeThisYear('now'),
                'hashtags'          => $faker->words(),
                'is_bot'            => true
            ];
        }

        return $posts;
    }

    public static function generate_test_profile()
    {
        $faker = Faker::create();

        return [
            'name'      => $faker->name(),
            'bio'       => $faker->sentence().'
            
'.$faker->sentence(2),
            'joined'    => $faker->dateTimeThisDecade()->format('Y/m/d'),
            'followers' => $faker->numberBetween(0, 50000),
            'following' => $faker->numberBetween(0, 50000),
        ];
    }

    /**
     * Get a goofy catchphrase about topics
     *
     * @return string
     */
    public static function topics_catchphrase()
    {
        return Collection::make([
            'it\'s all about',
            'the people demand',
            'what\'s up with',
            'hot on the block:',
            'i really like',
            'i really hate'
        ])->random();
    }

    /**
     * @see https://github.com/laravel/framework/blob/6.x/src/Illuminate/Foundation/Inspiring.php
     *
     * Get an inspiring quote.
     *
     * @return string
     */
    public static function quote()
    {
        return Collection::make([
            'When there is no desire, all things are at peace. - Laozi',
            'Simplicity is the ultimate sophistication. - Leonardo da Vinci',
            'Simplicity is the essence of happiness. - Cedric Bledsoe',
            'Smile, breathe, and go slowly. - Thich Nhat Hanh',
            'Simplicity is an acquired taste. - Katharine Gerould',
            'Well begun is half done. - Aristotle',
            'He who is contented is rich. - Laozi',
            'Very little is needed to make a happy life. - Marcus Antoninus',
            'It is quality rather than quantity that matters. - Lucius Annaeus Seneca',
            'Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant',
            'Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci',
            'An unexamined life is not worth living. - Socrates',
            'Happiness is not something readymade. It comes from your own actions. - Dalai Lama',
            'The only way to do great work is to love what you do. - Steve Jobs',
            'The whole future lies in uncertainty: live immediately. - Seneca',
            'Waste no more time arguing what a good man should be, be one. - Marcus Aurelius',
            'It is not the man who has too little, but the man who craves more, that is poor. - Seneca',
            'I begin to speak only when I am certain what I will say is not better left unsaid - Cato the Younger',
            'Order your soul. Reduce your wants. - Augustine',
            'Be present above all else. - Naval Ravikant',
            'Let all your things have their places; let each part of your business have its time. - Benjamin Franklin',
            'If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius',
            'No surplus words or unnecessary actions. - Marcus Aurelius',
            'People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius',
        ])->random();
    }
}
