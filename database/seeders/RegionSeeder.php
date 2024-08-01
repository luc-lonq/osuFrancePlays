<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Region::factory()->create([
            'id' => 1,
            'name' => 'Auvergne-Rhône-Alpes',
            'acronym' => 'ARA'
        ]);
        Region::factory()->create([
            'id' => 2,
            'name' => 'Bourgogne-Franche-Comté',
            'acronym' => 'BFC'
        ]);
        Region::factory()->create([
            'id' => 3,
            'name' => 'Bretagne',
            'acronym' => 'BZH'
        ]);
        Region::factory()->create([
            'id' => 4,
            'name' => 'Centre-Val de Loire',
            'acronym' => 'CVL'
        ]);
        Region::factory()->create([
            'id' => 5,
            'name' => 'Corse',
            'acronym' => 'CRS'
        ]);
        Region::factory()->create([
            'id' => 6,
            'name' => 'Hauts-de-France',
            'acronym' => 'HDF'
        ]);
        Region::factory()->create([
            'id' => 7,
            'name' => 'Grand-Est',
            'acronym' => 'GE'
        ]);
        Region::factory()->create([
            'id' => 8,
            'name' => 'Ile-de-France',
            'acronym' => 'IDF'
        ]);
        Region::factory()->create([
            'id' => 9,
            'name' => 'Normandie',
            'acronym' => 'NRM'
        ]);
        Region::factory()->create([
            'id' => 10,
            'name' => 'Nouvelle-Aquitaine',
            'acronym' => 'NA'
        ]);
        Region::factory()->create([
            'id' => 11,
            'name' => 'Occitanie',
            'acronym' => 'OCC'
        ]);
        Region::factory()->create([
            'id' => 12,
            'name' => 'Pays de la Loire',
            'acronym' => 'PDL'
        ]);
        Region::factory()->create([
            'id' => 13,
            'name' => 'Provence-Alpes-Côte d\'Azur',
            'acronym' => 'PACA'
        ]);
    }
}
