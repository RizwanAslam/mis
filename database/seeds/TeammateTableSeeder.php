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
            'full_name'=>'Rizwan Aslam',
            'father_name'=>'Muhammad Aslam',
            'date_of_birth'=>'',
            'date_of_joining'=>'2016-05-02',
            'designation'=>'CEO',
            'months_of_confirmation'=>'1',
            'months_of_increment'=>'12',
            'basic_pay'=>'50000',
            'email'=>'rizwan@codebrisk.com',
            'phone_mobile'=>'',
            'phone_home'=>'',
            'address1'=>'Al Rehman Trade Center, University Road، Sargodha 40100',
            'address2'=>'',
            'city'=>'Sargodha',
            'elance_user_id'=>'2499639'
        ]);
        Model::reguard();
    }
}
