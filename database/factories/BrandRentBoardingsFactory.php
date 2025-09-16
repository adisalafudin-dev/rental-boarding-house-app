<?php

namespace Database\Factories;

use App\Models\BrandRentBoardings;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BrandRentBoardings>
 */
class BrandRentBoardingsFactory extends Factory
{
    protected $model = BrandRentBoardings::class;

    public function definition(): array
    {
        return [
            'nama_brand' => $this->faker->company,
            'logo' => $this->faker->imageUrl(200, 200, 'business'),
            'alamat' => $this->faker->address,
            'dokumen_izin' => $this->faker->word,
            'dokumen_ktp' => null,
            'dokumen_npwp' => null,
            'dokumen_lain' => null,
        ];
    }
}
