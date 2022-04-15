<?php

namespace Database\Factories;

use App\Request;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Request::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'college' => $this->faker->college,
            'faculty' => $this->faker->faculty,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
