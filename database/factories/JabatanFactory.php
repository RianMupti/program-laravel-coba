<?php

namespace Database\Factories;

use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Factories\Factory;

class JabatanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jabatan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_jabatan' => $this->faker->firstName('female'),
            'gaji_pokok' => '7000000',
            'tunjangan_jabatan' => '1500000',
            'tunjangan_makan_perhari' => '30000',
            'tunjangan_transport_perhari' => $this->faker->numberBetween(15000, 35000),
        ];
    }
}
