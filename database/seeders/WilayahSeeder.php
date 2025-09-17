<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $this->command->info('Fetching provinces data...');
            
            // Get provinces data
            $response = Http::withoutVerifying()->get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
            
            if (!$response->successful()) {
                throw new \Exception('Failed to fetch provinces data. Status: ' . $response->status());
            }
            
            $provinces = $response->json();
            
            if (empty($provinces)) {
                throw new \Exception('Empty provinces data received');
            }

            $this->command->info('Found ' . count($provinces) . ' provinces');

            foreach ($provinces as $province) {
                // Insert province
                DB::table("province")->updateOrInsert(
                    ['id' => $province["id"]],
                    [
                        "id" => $province["id"],
                        "nama" => $province["name"], // API menggunakan 'name', bukan 'nama'
                    ]
                );

                $this->command->info("Processing cities for province: {$province['name']}");

                // Get cities for this province
                $citiesResponse = Http::withoutVerifying()
                    ->get("https://emsifa.github.io/api-wilayah-indonesia/api/regencies/{$province['id']}.json");

                if (!$citiesResponse->successful()) {
                    Log::warning("Failed to fetch cities for province {$province['id']}: " . $citiesResponse->status());
                    continue;
                }

                $cities = $citiesResponse->json();

                if (empty($cities)) {
                    Log::warning("Empty cities data for province {$province['id']}");
                    continue;
                }

                foreach ($cities as $city) {
                    DB::table('kota')->updateOrInsert(
                        ['id' => $city['id']],
                        [
                            'id' => $city['id'],
                            'id_provinsi' => $city['province_id'],
                            'nama' => $city['name'], // API menggunakan 'name'

                        ]
                    );
                }

                $this->command->info("Processed " . count($cities) . " cities for {$province['name']}");
                
                // Small delay to avoid overwhelming the API
                usleep(100000); // 0.1 second delay
            }

            $this->command->info('✅ Wilayah seeding completed successfully!');

        } catch (\Exception $e) {
            Log::error('WilayahSeeder failed: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            $this->command->error('❌ Seeding failed: ' . $e->getMessage());
            throw $e; // Re-throw to stop seeding process
        }
    }
}