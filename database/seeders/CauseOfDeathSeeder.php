<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CauseOfDeath;

class CauseOfDeathSeeder extends Seeder
{
    public function run()
    {
        $causes = [
            ['name' => 'بیماری قلبی'],
            ['name' => 'تصادف'],
            ['name' => 'سکته مغزی'],
            ['name' => 'بیماری عفونی'],
            ['name' => 'دیگر'],
        ];

        CauseOfDeath::insert($causes);
    }
}
