<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolYearFactory extends Factory
{
    protected $model = \App\Models\SchoolYear::class;

    public function definition()
    {
        // Lấy năm bắt đầu ngẫu nhiên trong khoảng 2015-2023
        $startYear = $this->faker->numberBetween(2015, 2023);
        $endYear = $startYear + 1;

        return [
            'name' => "Năm học {$startYear}-{$endYear}",
            'start_year' => $startYear,
            'end_year' => $endYear,
        ];
    }
}
