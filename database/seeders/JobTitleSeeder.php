<?php

namespace Database\Seeders;

use App\Models\JobTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('csv/jobtitle.csv'), 'r');
        $firstline = true;
        while (($read_data = fgetcsv($csvFile, 1000, ',')) !== FALSE) {
            if (!$firstline) {
                JobTitle::factory()->create([
                    'name' => $read_data[0]
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
