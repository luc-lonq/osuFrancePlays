<?php

namespace App\Models;


class RegionBack
{
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Auvergne-Rhône-Alpes',
                'acronym' => 'ARA'
            ],
            [
                'id' => 2,
                'name' => 'Bourgogne-Franche-Comté',
                'acronym' => 'BFC'
            ],
            [
                'id' => 3,
                'name' => 'Bretagne',
                'acronym' => 'BZH'
            ],
            [
                'id' => 4,
                'name' => 'Centre-Val de Loire',
                'acronym' => 'CVL'
            ],
            [
                'id' => 5,
                'name' => 'Corse',
                'acronym' => 'CRS'
            ],
            [
                'id' => 6,
                'name' => 'Hauts-de-France',
                'acronym' => 'HDF'
            ],
            [
                'id' => 7,
                'name' => 'Grand-Est',
                'acronym' => 'GE'
            ],
            [
                'id' => 8,
                'name' => 'Ile-de-France',
                'acronym' => 'IDF'
            ],
            [
                'id' => 9,
                'name' => 'Normandie',
                'acronym' => 'NRM'
            ],
            [
                'id' => 10,
                'name' => 'Nouvelle-Aquitaine',
                'acronym' => 'NA'
            ],
            [
                'id' => 11,
                'name' => 'Occitanie',
                'acronym' => 'OCC'
            ],
            [
                'id' => 12,
                'name' => 'Pays de la Loire',
                'acronym' => 'PDL'
            ],
            [
                'id' => 13,
                'name' => 'Provence-Alpes-Côte d\'Azur',
                'acronym' => 'PACA'
            ]
        ];
    }

    public static function find(int $id): ?array
    {
        return static::all()[$id] ?? null;
    }
}
