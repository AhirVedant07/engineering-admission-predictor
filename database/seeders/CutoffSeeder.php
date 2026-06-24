<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CutoffSeeder extends Seeder
{
    public function run(): void
    {
        $file = fopen(base_path('2024_final.csv'), 'r');

        fgetcsv($file); // skip header

        while (($row = fgetcsv($file)) !== false) {

            DB::table('cutoffs')->insert([
                'year' => $row[0],
                'college_code' => $row[1],
                'college_name' => $row[2],
                'branch_code' => $row[3],
                'branch_name' => $row[4],
                'category' => $row[5],
                'percentile' => $row[6],
            ]);
        }

        fclose($file);
    }
}