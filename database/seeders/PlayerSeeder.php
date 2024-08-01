<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Player::factory()->create([
            'id' => 1,
            'osu_id' => 17104779,
            'username' => 'Barbone',
            'pp' => 16975,
            'rank' => 101,
            'country_rank' => 1,
            'region_rank' => 1,
            'region_id' => 10,
        ]);
        Player::factory()->create([
            'id' => 2,
            'osu_id' => 14733798,
            'username' => 'Zeaqk',
            'pp' => 16780,
            'rank' => 110,
            'country_rank' => 2,
            'region_rank' => 1,
            'region_id' => 11,
        ]);
        Player::factory()->create([
            'id' => 3,
            'osu_id' => 8443945,
            'username' => 'FlasTEH',
            'pp' => 16170,
            'rank' => 157,
            'country_rank' => 3,
            'region_rank' => 2,
            'region_id' => 10,
        ]);
        Player::factory()->create([
            'id' => 4,
            'osu_id' => 7657831,
            'username' => 'justman',
            'pp' => 15858,
            'rank' => 185,
            'country_rank' => 4,
            'region_rank' => 1,
            'region_id' => 13,
        ]);
        Player::factory()->create([
            'id' => 5,
            'osu_id' => 4141918,
            'username' => 'Thundur',
            'pp' => 15525,
            'rank' => 222,
            'country_rank' => 5,
            'region_rank' => 1,
            'region_id' => 12,
        ]);
        Player::factory()->create([
            'id' => 6,
            'osu_id' => 18323396,
            'username' => 'golem de caca',
            'pp' => 14986,
            'rank' => 288,
            'country_rank' => 6,
            'region_rank' => 2,
            'region_id' => 13,
        ]);
        Player::factory()->create([
            'id' => 7,
            'osu_id' => 11948617,
            'username' => 'Saymel',
            'pp' => 14876,
            'rank' => 304,
            'country_rank' => 7,
            'region_rank' => 1,
            'region_id' => 8,
        ]);
        Player::factory()->create([
            'id' => 8,
            'osu_id' => 6337610,
            'username' => 'Giga Mars',
            'pp' => 14606,
            'rank' => 356,
            'country_rank' => 8,
            'region_rank' => 2,
            'region_id' => 11,
        ]);
        Player::factory()->create([
            'id' => 9,
            'osu_id' => 2831793,
            'username' => 'chokbar de bz',
            'pp' => 14497,
            'rank' => 370,
            'country_rank' => 9,
            'region_rank' => 1,
            'region_id' => 2,
        ]);
        Player::factory()->create([
            'id' => 10,
            'osu_id' => 9650310,
            'username' => 'Asckar',
            'pp' => 14223,
            'rank' => 423,
            'country_rank' => 10,
            'region_rank' => 1,
            'region_id' => 9,
        ]);
        Player::factory()->create([
            'id' => 11,
            'osu_id' => 6133101,
            'username' => 'Arakii',
            'pp' => 14149,
            'rank' => 438,
            'country_rank' => 11,
            'region_rank' => 3,
            'region_id' => 11,
        ]);
        Player::factory()->create([
            'id' => 12,
            'osu_id' => 7068158,
            'username' => 'JapWhite',
            'pp' => 14149,
            'rank' => 440,
            'country_rank' => 12,
            'region_rank' => 1,
            'region_id' => 7,
        ]);
        Player::factory()->create([
            'id' => 13,
            'osu_id' => 7806847,
            'username' => 'suly',
            'pp' => 14130,
            'rank' => 443,
            'country_rank' => 13,
            'region_rank' => 1,
            'region_id' => 3,
        ]);
        Player::factory()->create([
            'id' => 14,
            'osu_id' => 11750028,
            'username' => 'Thuya',
            'pp' => 14102,
            'rank' => 451,
            'country_rank' => 14,
            'region_rank' => 2,
            'region_id' => 8,
        ]);
        Player::factory()->create([
            'id' => 15,
            'osu_id' => 14289060,
            'username' => 'DEMOLITORUS',
            'pp' => 13788,
            'rank' => 537,
            'country_rank' => 15,
            'region_rank' => 2,
            'region_id' => 3,
        ]);
        Player::factory()->create([
            'id' => 16,
            'osu_id' => 251683,
            'username' => 'Musty',
            'pp' => 13695,
            'rank' => 566,
            'country_rank' => 16,
            'region_rank' => 3,
            'region_id' => 10,
        ]);
        Player::factory()->create([
            'id' => 17,
            'osu_id' => 3872987,
            'username' => '-raizen-',
            'pp' => 13678,
            'rank' => 575,
            'country_rank' => 17,
            'region_rank' => 2,
            'region_id' => 2,
        ]);
        Player::factory()->create([
            'id' => 18,
            'osu_id' => 4301976,
            'username' => 'Hifkil',
            'pp' => 13660,
            'rank' => 582,
            'country_rank' => 18,
            'region_rank' => 3,
            'region_id' => 8,
        ]);
        Player::factory()->create([
            'id' => 19,
            'osu_id' => 14176480,
            'username' => 'Raspigaous',
            'pp' => 13637,
            'rank' => 592,
            'country_rank' => 19,
            'region_rank' => 1,
            'region_id' => 1,
        ]);
        Player::factory()->create([
            'id' => 20,
            'osu_id' => 284905,
            'username' => 'Ekoro',
            'pp' => 13552,
            'rank' => 620,
            'country_rank' => 20,
            'region_rank' => 4,
            'region_id' => 8,
        ]);
        Player::factory()->create([
            'id' => 21,
            'osu_id' => 13080423,
            'username' => 'sekibae',
            'pp' => 13543,
            'rank' => 624,
            'country_rank' => 21,
            'region_rank' => 1,
            'region_id' => 6,
        ]);
        Player::factory()->create([
            'id' => 22,
            'osu_id' => 5783315,
            'username' => 'Carbone',
            'pp' => 13370,
            'rank' => 686,
            'country_rank' => 22,
            'region_rank' => 2,
            'region_id' => 6,
        ]);
        Player::factory()->create([
            'id' => 23,
            'osu_id' => 7728757,
            'username' => '-ZooM-',
            'pp' => 13275,
            'rank' => 726,
            'country_rank' => 23,
            'region_rank' => 3,
            'region_id' => 13,
        ]);
        Player::factory()->create([
            'id' => 24,
            'osu_id' => 718454,
            'username' => 'ThePooN',
            'pp' => 13150,
            'rank' => 774,
            'country_rank' => 24,
            'region_rank' => 3,
            'region_id' => 6,
        ]);
        Player::factory()->create([
            'id' => 25,
            'osu_id' => 11345747,
            'username' => 'BProd',
            'pp' => 13079,
            'rank' => 808,
            'country_rank' => 25,
            'region_rank' => 3,
            'region_id' => 3,
        ]);
        Player::factory()->create([
            'id' => 26,
            'osu_id' => 3820683,
            'username' => 'KC Snorlaax',
            'pp' => 13079,
            'rank' => 809,
            'country_rank' => 26,
            'region_rank' => 4,
            'region_id' => 13,
        ]);
        Player::factory()->create([
            'id' => 27,
            'osu_id' => 13652059,
            'username' => 'MietteDePain_',
            'pp' => 13053,
            'rank' => 824,
            'country_rank' => 27,
            'region_rank' => 4,
            'region_id' => 11,
        ]);
        Player::factory()->create([
            'id' => 28,
            'osu_id' => 4185400,
            'username' => '-Nenu-',
            'pp' => 13035,
            'rank' => 827,
            'country_rank' => 28,
            'region_rank' => 2,
            'region_id' => 9,
        ]);
        Player::factory()->create([
            'id' => 29,
            'osu_id' => 11170841,
            'username' => '-Wum-',
            'pp' => 12929,
            'rank' => 870,
            'country_rank' => 29,
            'region_rank' => 4,
            'region_id' => 3,
        ]);
        Player::factory()->create([
            'id' => 30,
            'osu_id' => 3213239,
            'username' => 'flaven',
            'pp' => 12836,
            'rank' => 909,
            'country_rank' => 30,
            'region_rank' => 3,
            'region_id' => 2,
        ]);
        Player::factory()->create([
            'id' => 31,
            'osu_id' => 8573172,
            'username' => 'Hardstuck 10',
            'pp' => 12784,
            'rank' => 932,
            'country_rank' => 31,
            'region_rank' => 2,
            'region_id' => 7,
        ]);
        Player::factory()->create([
            'id' => 32,
            'osu_id' => 14165027,
            'username' => 'lonq noir',
            'pp' => 12716,
            'rank' => 960,
            'country_rank' => 32,
            'region_rank' => 4,
            'region_id' => 10,
        ]);
        Player::factory()->create([
            'id' => 33,
            'osu_id' => 8236827,
            'username' => 'Fumatsu',
            'pp' => 12692,
            'rank' => 971,
            'country_rank' => 33,
            'region_rank' => 5,
            'region_id' => 8,
        ]);
        Player::factory()->create([
            'id' => 34,
            'osu_id' => 11053358,
            'username' => 'Garage du Lac',
            'pp' => 12662,
            'rank' => 989,
            'country_rank' => 34,
            'region_rank' => 5,
            'region_id' => 11,
        ]);
        Player::factory()->create([
            'id' => 35,
            'osu_id' => 14547194,
            'username' => 'Azertyran',
            'pp' => 12660,
            'rank' => 991,
            'country_rank' => 35,
            'region_rank' => 5,
            'region_id' => 13,
        ]);
        Player::factory()->create([
            'id' => 36,
            'osu_id' => 10656864,
            'username' => 'Nessy',
            'pp' => 12553,
            'rank' => 1059,
            'country_rank' => 36,
            'region_rank' => 3,
            'region_id' => 9,
        ]);
        Player::factory()->create([
            'id' => 37,
            'osu_id' => 11843859,
            'username' => 'TacosCordoba',
            'pp' => 12486,
            'rank' => 1116,
            'country_rank' => 37,
            'region_rank' => 2,
            'region_id' => 1,
        ]);
        Player::factory()->create([
            'id' => 38,
            'osu_id' => 14935968,
            'username' => '-Watamelon',
            'pp' => 12470,
            'rank' => 1128,
            'country_rank' => 38,
            'region_rank' => 3,
            'region_id' => 1,
        ]);
        Player::factory()->create([
            'id' => 39,
            'osu_id' => 11285958,
            'username' => 'Biroche',
            'pp' => 12445,
            'rank' => 1139,
            'country_rank' => 39,
            'region_rank' => 3,
            'region_id' => 7,
        ]);
        Player::factory()->create([
            'id' => 40,
            'osu_id' => 12529846,
            'username' => 'Oxvenn',
            'pp' => 12323,
            'rank' => 1220,
            'country_rank' => 40,
            'region_rank' => 6,
            'region_id' => 8,
        ]);
        Player::factory()->create([
            'id' => 41,
            'osu_id' => 5189431,
            'username' => 'Hardstuck 2',
            'pp' => 12269,
            'rank' => 1262,
            'country_rank' => 41,
            'region_rank' => 4,
            'region_id' => 1,
        ]);
        Player::factory()->create([
            'id' => 42,
            'osu_id' => 12902063,
            'username' => 'Francois',
            'pp' => 12134,
            'rank' => 1352,
            'country_rank' => 42,
            'region_rank' => 7,
            'region_id' => 8,
        ]);
        Player::factory()->create([
            'id' => 43,
            'osu_id' => 14522031,
            'username' => 'V0The',
            'pp' => 12044,
            'rank' => 1415,
            'country_rank' => 43,
            'region_rank' => 2,
            'region_id' => 12,
        ]);
        Player::factory()->create([
            'id' => 44,
            'osu_id' => 1093361,
            'username' => 'Kynan',
            'pp' => 12001,
            'rank' => 1447,
            'country_rank' => 44,
            'region_rank' => 1,
            'region_id' => 4,
        ]);
        Player::factory()->create([
            'id' => 45,
            'osu_id' => 25626082,
            'username' => 'Satsukiiii',
            'pp' => 11978,
            'rank' => 1467,
            'country_rank' => 45,
            'region_rank' => 4,
            'region_id' => 9,
        ]);
        Player::factory()->create([
            'id' => 46,
            'osu_id' => 25643883,
            'username' => 'dragrochibrax',
            'pp' => 11928,
            'rank' => 1503,
            'country_rank' => 46,
            'region_rank' => 8,
            'region_id' => 8,
        ]);
        Player::factory()->create([
            'id' => 47,
            'osu_id' => 2705430,
            'username' => 'Mooha',
            'pp' => 11872,
            'rank' => 1545,
            'country_rank' => 47,
            'region_rank' => 9,
            'region_id' => 8,
        ]);
        Player::factory()->create([
            'id' => 48,
            'osu_id' => 11445862,
            'username' => 'Nyuchikin',
            'pp' => 11866,
            'rank' => 1552,
            'country_rank' => 48,
            'region_rank' => 5,
            'region_id' => 1,
        ]);
        Player::factory()->create([
            'id' => 49,
            'osu_id' => 11159039,
            'username' => 'Toblerone',
            'pp' => 11865,
            'rank' => 1553,
            'country_rank' => 49,
            'region_rank' => 5,
            'region_id' => 10,
        ]);
        Player::factory()->create([
            'id' => 50,
            'osu_id' => 16011130,
            'username' => 'Nayshi',
            'pp' => 11860,
            'rank' => 1560,
            'country_rank' => 50,
            'region_rank' => 1,
            'region_id' => 5,
        ]);
        Player::factory()->create([
            'id' => 51,
            'osu_id' => 12981253,
            'username' => 'wowaka',
            'pp' => 11807,
            'rank' => 1596,
            'country_rank' => 51,
            'region_rank' => 6,
            'region_id' => 10,
        ]);
        Player::factory()->create([
            'id' => 52,
            'osu_id' => 13266755,
            'username' => 'Xiel',
            'pp' => 11792,
            'rank' => 1608,
            'country_rank' => 52,
            'region_rank' => 2,
            'region_id' => 5,
        ]);
        Player::factory()->create([
            'id' => 53,
            'osu_id' => 12498437,
            'username' => 'lightingloyz',
            'pp' => 11792,
            'rank' => 1612,
            'country_rank' => 53,
            'region_rank' => 10,
            'region_id' => 8,
        ]);
        Player::factory()->create([
            'id' => 54,
            'osu_id' => 1825928,
            'username' => 'oxia',
            'pp' => 11768,
            'rank' => 1638,
            'country_rank' => 54,
            'region_rank' => 6,
            'region_id' => 13,
        ]);
        Player::factory()->create([
            'id' => 55,
            'osu_id' => 1545031,
            'username' => 'NerO',
            'pp' => 11750,
            'rank' => 1652,
            'country_rank' => 55,
            'region_rank' => 6,
            'region_id' => 1,
        ]);
        Player::factory()->create([
            'id' => 56,
            'osu_id' => 6137858,
            'username' => 'GLORYHAMMER',
            'pp' => 11742,
            'rank' => 1664,
            'country_rank' => 56,
            'region_rank' => 3,
            'region_id' => 12,
        ]);
        Player::factory()->create([
            'id' => 57,
            'osu_id' => 22603358,
            'username' => 'Carlos Alcaraz',
            'pp' => 11658,
            'rank' => 1734,
            'country_rank' => 57,
            'region_rank' => 4,
            'region_id' => 12,
        ]);
        Player::factory()->create([
            'id' => 58,
            'osu_id' => 7630971,
            'username' => 'VROUM CV VITE',
            'pp' => 11645,
            'rank' => 1744,
            'country_rank' => 58,
            'region_rank' => 4,
            'region_id' => 2,
        ]);
        Player::factory()->create([
            'id' => 59,
            'osu_id' => 4595465,
            'username' => 'lespi6',
            'pp' => 11583,
            'rank' => 1800,
            'country_rank' => 59,
            'region_rank' => 6,
            'region_id' => 11,
        ]);
        Player::factory()->create([
            'id' => 60,
            'osu_id' => 10325072,
            'username' => 'Fiaee',
            'pp' => 11514,
            'rank' => 1875,
            'country_rank' => 60,
            'region_rank' => 4,
            'region_id' => 7,
        ]);
        Player::factory()->create([
            'id' => 61,
            'osu_id' => 4651270,
            'username' => 'tutur2224',
            'pp' => 11454,
            'rank' => 1931,
            'country_rank' => 61,
            'region_rank' => 7,
            'region_id' => 1,
        ]);
        Player::factory()->create([
            'id' => 62,
            'osu_id' => 12131713,
            'username' => '-AltamicseuH-',
            'pp' => 11437,
            'rank' => 1942,
            'country_rank' => 62,
            'region_rank' => 8,
            'region_id' => 1,
        ]);
        Player::factory()->create([
            'id' => 63,
            'osu_id' => 9049282,
            'username' => '[RUE]Clamati',
            'pp' => 11435,
            'rank' => 1947,
            'country_rank' => 63,
            'region_rank' => 7,
            'region_id' => 10,
        ]);
        Player::factory()->create([
            'id' => 64,
            'osu_id' => 6695155,
            'username' => 'Ankay',
            'pp' => 11404,
            'rank' => 1980,
            'country_rank' => 64,
            'region_rank' => 5,
            'region_id' => 7,
        ]);
        Player::factory()->create([
            'id' => 65,
            'osu_id' => 9246648,
            'username' => 'AmaoTsuki',
            'pp' => 11404,
            'rank' => 1981,
            'country_rank' => 65,
            'region_rank' => 6,
            'region_id' => 7,
        ]);
        Player::factory()->create([
            'id' => 66,
            'osu_id' => 16129459,
            'username' => 'Squid Game',
            'pp' => 11396,
            'rank' => 1986,
            'country_rank' => 66,
            'region_rank' => 5,
            'region_id' => 2,
        ]);
        Player::factory()->create([
            'id' => 67,
            'osu_id' => 7858823,
            'username' => 'DoIon',
            'pp' => 11393,
            'rank' => 1991,
            'country_rank' => 67,
            'region_rank' => 3,
            'region_id' => 5,
        ]);
        Player::factory()->create([
            'id' => 68,
            'osu_id' => 7948627,
            'username' => 'BAKKALO',
            'pp' => 11308,
            'rank' => 2081,
            'country_rank' => 68,
            'region_rank' => 11,
            'region_id' => 8,
        ]);
        Player::factory()->create([
            'id' => 69,
            'osu_id' => 3547290,
            'username' => 'Mitchi',
            'pp' => 11286,
            'rank' => 2112,
            'country_rank' => 69,
            'region_rank' => 9,
            'region_id' => 1,
        ]);
        Player::factory()->create([
            'id' => 70,
            'osu_id' => 4904410,
            'username' => 'Charles LecIerc',
            'pp' => 11284,
            'rank' => 2116,
            'country_rank' => 70,
            'region_rank' => 10,
            'region_id' => 1,
        ]);
        Player::factory()->create([
            'id' => 71,
            'osu_id' => 3578303,
            'username' => 'Shinkei',
            'pp' => 11246,
            'rank' => 2163,
            'country_rank' => 71,
            'region_rank' => 12,
            'region_id' => 8,
        ]);
        Player::factory()->create([
            'id' => 72,
            'osu_id' => 8562135,
            'username' => 'TheFifouSlain',
            'pp' => 11120,
            'rank' => 2328,
            'country_rank' => 72,
            'region_rank' => 11,
            'region_id' => 1,
        ]);
        Player::factory()->create([
            'id' => 73,
            'osu_id' => 4611418,
            'username' => 'Xevyyy',
            'pp' => 11091,
            'rank' => 2369,
            'country_rank' => 73,
            'region_rank' => 4,
            'region_id' => 5,
        ]);
        Player::factory()->create([
            'id' => 74,
            'osu_id' => 17067266,
            'username' => 'Nightwoolf',
            'pp' => 11070,
            'rank' => 2408,
            'country_rank' => 74,
            'region_rank' => 5,
            'region_id' => 5,
        ]);
        Player::factory()->create([
            'id' => 75,
            'osu_id' => 19780631,
            'username' => 'Airainn',
            'pp' => 11063,
            'rank' => 2418,
            'country_rank' => 75,
            'region_rank' => 6,
            'region_id' => 5,
        ]);
        Player::factory()->create([
            'id' => 76,
            'osu_id' => 7810180,
            'username' => 'calangi',
            'pp' => 11060,
            'rank' => 2420,
            'country_rank' => 76,
            'region_rank' => 7,
            'region_id' => 7,
        ]);
        Player::factory()->create([
            'id' => 77,
            'osu_id' => 18419720,
            'username' => 'Owpack',
            'pp' => 11016,
            'rank' => 2472,
            'country_rank' => 77,
            'region_rank' => 7,
            'region_id' => 11,
        ]);
        Player::factory()->create([
            'id' => 78,
            'osu_id' => 1019489,
            'username' => 'Worne',
            'pp' => 10966,
            'rank' => 2527,
            'country_rank' => 78,
            'region_rank' => 8,
            'region_id' => 10,
        ]);
        Player::factory()->create([
            'id' => 79,
            'osu_id' => 3674590,
            'username' => 'milkybox',
            'pp' => 10960,
            'rank' => 2532,
            'country_rank' => 79,
            'region_rank' => 13,
            'region_id' => 8,
        ]);
        Player::factory()->create([
            'id' => 80,
            'osu_id' => 11245184,
            'username' => '-Atour-',
            'pp' => 10958,
            'rank' => 2537,
            'country_rank' => 80,
            'region_rank' => 4,
            'region_id' => 6,
        ]);
        Player::factory()->create([
            'id' => 81,
            'osu_id' => 13798356,
            'username' => 'Atsuuu',
            'pp' => 10956,
            'rank' => 2541,
            'country_rank' => 81,
            'region_rank' => 6,
            'region_id' => 2,
        ]);
        Player::factory()->create([
            'id' => 82,
            'osu_id' => 6191548,
            'username' => 'N A R X I S',
            'pp' => 10928,
            'rank' => 2575,
            'country_rank' => 82,
            'region_rank' => 7,
            'region_id' => 13,
        ]);
        Player::factory()->create([
            'id' => 83,
            'osu_id' => 9781008,
            'username' => 'Masaato',
            'pp' => 10910,
            'rank' => 2597,
            'country_rank' => 83,
            'region_rank' => 5,
            'region_id' => 3,
        ]);
        Player::factory()->create([
            'id' => 84,
            'osu_id' => 12484908,
            'username' => 'Traz',
            'pp' => 10910,
            'rank' => 2598,
            'country_rank' => 84,
            'region_rank' => 2,
            'region_id' => 4,
        ]);
        Player::factory()->create([
            'id' => 85,
            'osu_id' => 14717856,
            'username' => 'Trousse',
            'pp' => 10890,
            'rank' => 2626,
            'country_rank' => 85,
            'region_rank' => 8,
            'region_id' => 13,
        ]);
        Player::factory()->create([
            'id' => 86,
            'osu_id' => 15452023,
            'username' => 'Lexarh',
            'pp' => 10883,
            'rank' => 2635,
            'country_rank' => 86,
            'region_rank' => 7,
            'region_id' => 5,
        ]);
        Player::factory()->create([
            'id' => 87,
            'osu_id' => 3861234,
            'username' => 'Eldera',
            'pp' => 10880,
            'rank' => 2640,
            'country_rank' => 87,
            'region_rank' => 14,
            'region_id' => 8,
        ]);
        Player::factory()->create([
            'id' => 88,
            'osu_id' => 10434787,
            'username' => 'CharleLee',
            'pp' => 10872,
            'rank' => 2658,
            'country_rank' => 88,
            'region_rank' => 15,
            'region_id' => 8,
        ]);
        Player::factory()->create([
            'id' => 89,
            'osu_id' => 12437546,
            'username' => 'le pauvre bil',
            'pp' => 10853,
            'rank' => 2687,
            'country_rank' => 89,
            'region_rank' => 8,
            'region_id' => 5,
        ]);
        Player::factory()->create([
            'id' => 90,
            'osu_id' => 1049999,
            'username' => 'Myko',
            'pp' => 10801,
            'rank' => 2760,
            'country_rank' => 90,
            'region_rank' => 8,
            'region_id' => 11,
        ]);
        Player::factory()->create([
            'id' => 91,
            'osu_id' => 4299402,
            'username' => '-Yato-',
            'pp' => 10789,
            'rank' => 2772,
            'country_rank' => 91,
            'region_rank' => 9,
            'region_id' => 5,
        ]);
        Player::factory()->create([
            'id' => 92,
            'osu_id' => 10790692,
            'username' => 'Makaron',
            'pp' => 10768,
            'rank' => 2809,
            'country_rank' => 92,
            'region_rank' => 9,
            'region_id' => 11,
        ]);
        Player::factory()->create([
            'id' => 93,
            'osu_id' => 3996331,
            'username' => 'ShinysArc',
            'pp' => 10744,
            'rank' => 2851,
            'country_rank' => 93,
            'region_rank' => 10,
            'region_id' => 5,
        ]);
        Player::factory()->create([
            'id' => 94,
            'osu_id' => 3832571,
            'username' => 'Kiss of Life',
            'pp' => 10737,
            'rank' => 2862,
            'country_rank' => 94,
            'region_rank' => 11,
            'region_id' => 5,
        ]);
        Player::factory()->create([
            'id' => 95,
            'osu_id' => 4381959,
            'username' => 'GanyUwU',
            'pp' => 10729,
            'rank' => 2878,
            'country_rank' => 95,
            'region_rank' => 5,
            'region_id' => 6,
        ]);
        Player::factory()->create([
            'id' => 96,
            'osu_id' => 13935409,
            'username' => 'Hardstcukc',
            'pp' => 10724,
            'rank' => 2889,
            'country_rank' => 96,
            'region_rank' => 6,
            'region_id' => 2,
        ]);
        Player::factory()->create([
            'id' => 97,
            'osu_id' => 8609496,
            'username' => 'AkiraSSG',
            'pp' => 10720,
            'rank' => 2898,
            'country_rank' => 97,
            'region_rank' => 12,
            'region_id' => 1,
        ]);
        Player::factory()->create([
            'id' => 98,
            'osu_id' => 12345641,
            'username' => 'Kuzuha',
            'pp' => 10696,
            'rank' => 2945,
            'country_rank' => 98,
            'region_rank' => 10,
            'region_id' => 11,
        ]);
        Player::factory()->create([
            'id' => 99,
            'osu_id' => 10304774,
            'username' => 'Ilmay',
            'pp' => 10677,
            'rank' => 2971,
            'country_rank' => 99,
            'region_rank' => 11,
            'region_id' => 11,
        ]);
        Player::factory()->create([
            'id' => 100,
            'osu_id' => 12959435,
            'username' => 'Eowish',
            'pp' => 10665,
            'rank' => 2987,
            'country_rank' => 100,
            'region_rank' => 12,
            'region_id' => 5,
        ]);
    }
}
