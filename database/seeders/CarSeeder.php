<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    // public function run()
    // {
    //     // Định nghĩa các trường dữ liệu cho Car
    //     $carsData = [
    //         [
    //             'model' => 'Model 1',
    //             'description' => 'Description 1',
    //             'brand' => 'Brand 1',
    //             'produced_on' => '2022-01-01',
    //             'image' => 'image1.jpg',
    //             'mf_id' => 1,
    //         ],
    //         [
    //             'model' => 'Model 2',
    //             'description' => 'Description 2',
    //             'brand' => 'Brand 2',
    //             'produced_on' => '2022-02-01',
    //             'image' => 'image2.jpg',
    //             'mf_id' => 2,
    //         ]
    //     ];

    //     // Tạo dữ liệu mẫu cho bảng Car bằng seeder
    //     foreach ($carsData as $carData) {
    //         Car::create($carData);
    //     }
    // }

    function run(){
        Car::factory()->count(50)->create();
    }
}