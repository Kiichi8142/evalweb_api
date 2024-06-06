<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path('csv/organization.csv'), 'r');
        $firstline = true;
        while (($read_data = fgetcsv($csvFile, 1000, ',')) !== FALSE) {
            if (!$firstline) {
                Organization::factory()->create([
                    'name' => $read_data[0]
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
