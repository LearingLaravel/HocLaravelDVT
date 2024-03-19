<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Mf;
class MfSeeder extends Seeder
{
  
    // public function run(): void
    // {

    //     $data = [
    //         ['id' => 1, 'mf_name' => 'Mf 1'],
    //         ['id' => 2, 'mf_name' => 'Mf 2'],
    //         ['id' => 3, 'mf_name' => 'Mf 3'],
    //     ];
    //     DB::table('mfs')->insert($data);
    // }

    public function run()
    {
        Mf::factory()->count(50)->create();
    }
}