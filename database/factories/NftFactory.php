<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
Use App\Models\User;
Use App\Models\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class NftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        $image= '/storage/image/nfts/default'. rand(1,5) . '.PNG';
        return [
            'owner_id' => User::inRandomOrder()->first()->id,
            'author_id' => User::inRandomOrder()->first()->id,
            'title'=> $this->faker->word,
            'route_img'=> $image ,
            'description' => $this->faker->text,
            'price' => rand(40,6000),
            'size' => rand(0,100),
            'royalties' => rand(0,100),
            'collection_id' => Collection::inRandomOrder()->first()->id
        ];
    }


}
