<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guest_id=User::where('role','guest')->first();
        $manager_id=User::where('role','manager')->first();
        DB::table('rooms')->insert([
            ['name' => 'Room 1',"guest_id"=>$guest_id->id,"manager_id"=>$manager_id->id],
            ['name' => 'Room 2',"guest_id"=>$guest_id->id,"manager_id"=>$manager_id->id],
            ['name' => 'Room 3',"guest_id"=>$guest_id->id,"manager_id"=>$manager_id->id],
        ]);
    }
}
