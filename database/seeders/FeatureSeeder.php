<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('features')->insert([
            [
                'name' => 'air-conditioning',
                'value' => 'Air conditioning'
            ],
            [
                'name' => 'heating-system',
                'value' => 'Heating system'
            ],
            [
                'name' => 'power-windows',
                'value' => 'Power windows'
            ],
            [
                'name' => 'power-mirrors',
                'value' => 'Power mirrors'
            ],
            [
                'name' => 'central-locking',
                'value' => 'Central locking'
            ],
            [
                'name' => 'sound-system',
                'value' => 'Sound system'
            ],
            [
                'name' => 'abs',
                'value' => 'ABS'
            ],
            [
                'name' => 'traction-control',
                'value' => 'Traction control'
            ],
            [
                'name' => 'rear-view',
                'value' => 'Rear-view cameras'
            ],
            [
                'name' => 'cruise-control',
                'value' => 'Cruise control'
            ],
            [
                'name' => 'gps-navigation',
                'value' => 'GPS navigation'
            ],
            [
                'name' => 'keyless-entry',
                'value' => 'Keyless entry/start'
            ],
        ]);
    }
}
