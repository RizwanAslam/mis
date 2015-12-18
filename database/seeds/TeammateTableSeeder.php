<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Teammate;
class TeammateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Teammate::create([
            'full_name'=>'Fakhar Zaman Khan',
            'father_name'=>'Munir Ahamed Khan',
            'date_of_birth'=>'1980-02-18',
            'date_of_joining'=>'2013-10-10',
            'designation'=>'CEO',
            'months_of_confirmation'=>'1',
            'months_of_increment'=>'12',
            'basic_pay'=>'50000',
            'email'=>'fakhar@softpyramid.com',
            'phone_mobile'=>'03224058008',
            'phone_home'=>'3569797',
            'address1'=>'32 A Ferozpur road',
            'address2'=>'',
            'city'=>'Lahore',
            'elance_user_id'=>'2499639'
        ]);
        Model::reguard();
    }
}
