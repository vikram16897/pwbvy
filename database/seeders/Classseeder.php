<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classname;

class Classseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classNames = ['Class7', 'Class8', 'Class9', 'Class10'];
    
        foreach ($classNames as $className) {
            Classname::insert([
                'class_name' => $className
            ]);
        }
    }
}
