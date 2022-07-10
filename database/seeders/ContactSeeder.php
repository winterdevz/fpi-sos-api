<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;
class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            "name"=>"Test",
            "contact"=>"2348132371012",
            "isActive"=>1
        ]);
        Contact::create([
            "name"=>"Test",
            "contact"=>"2348124814441",
            "isActive"=>1
        ]);
    }
}
