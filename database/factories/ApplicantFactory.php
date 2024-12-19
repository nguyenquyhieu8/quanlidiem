<?php

namespace Database\Factories;

use App\Models\Applicant;
use App\Models\SchoolYear;
use App\Models\Major;
use App\Models\SubjectBlock;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Province;
class ApplicantFactory extends Factory
{
    protected $model = Applicant::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'dob' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'school_year_id' => SchoolYear::inRandomOrder()->first()->id,
            'major_id' => Major::inRandomOrder()->first()->id,
            'subject_block_id' => SubjectBlock::inRandomOrder()->first()->id,
            'score' => $this->faker->randomFloat(2, 0, 30), // Điểm từ 0 đến 30
            'province_id' => Province::inRandomOrder()->value('code'),
            'code' => $this->generateRandomCode(),
        ];
    }
    private function generateRandomCode()
    {
        return str_pad(mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
    }
}
