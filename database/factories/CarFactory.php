<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Car;
use Faker\Generator as FakerGenerator;
use Faker\Generator as Faker;
use AvtoDev\FakerProviders\ExtendedFaker;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
class CarFactory extends Factory
{

    protected $model = Car::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker  = new FakerGenerator;
        $provider = \AvtoDev\FakerProviders\Providers\Cars\MarkAndModelProvider::class;
        $faker->addProvider(new $provider($faker));

        /** @var Faker|\AvtoDev\FakerProviders\ExtendedFaker $faker */
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'postalcode' => $this->faker->postcode,
            'model' => $faker->carModel(),
            'color' => $this->faker->safeColorName,
            'description' => $this->faker->text()
        ];

    }
}
