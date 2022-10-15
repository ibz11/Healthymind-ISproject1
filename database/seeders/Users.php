<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
//User
      DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@test.com',
            'phone'=>'07120011344567',
            'address'=>'Kenya',
            'role'=>'admin',
            'password'=>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

        //Dummy therapists
    
        DB::table('users')->insert([
            'name'=>'therapist1',
            'email'=>'therapist1@test.com',
            'phone'=>'07142672344567',
            'address'=>'Kenya',
            'role'=>'therapist',
            'password'=>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'name'=>'therapist2',
            'email'=>'therapist2@test.com',
            'phone'=>'07123334444567',
            'address'=>'Kenya',
            'role'=>'therapist',
            'password'=>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
        
        DB::table('users')->insert([
            'name'=>'therapist3',
            'email'=>'therapist3@test.com',
            'phone'=>'0712344123567',
            'address'=>'Kenya',
            'role'=>'therapist',
            'password'=>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
        
          
        DB::table('users')->insert([
            'name'=>'therapist4',
            'email'=>'therapist4@test.com',
            'phone'=>'07123475754567',
            'address'=>'Kenya',
            'role'=>'therapist',
            'password'=>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
        
        DB::table('users')->insert([
            'name'=>'therapist5',
            'email'=>'therapist5@test.com',
            'phone'=>'07123445969667',
            'address'=>'Kenya',
            'role'=>'therapist',
            'password'=>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name'=>'therapist6',
            'email'=>'therapist6@test.com',
            'phone'=>'07123773244567',
            'address'=>'Kenya',
            'role'=>'therapist',
            'password'=>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name'=>'therapist7',
            'email'=>'therapist7@test.com',
            'phone'=>'071234474567',
            'address'=>'Kenya',
            'role'=>'therapist',
            'password'=>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name'=>'therapist7',
            'email'=>'therapist7@test.com',
            'phone'=>'07749712344567',
            'address'=>'Kenya',
            'role'=>'therapist',
            'password'=>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
       
        //End of Dummy therapists


        //Dummy Editors
        DB::table('users')->insert([
            'name'=>'editor1',
            'email'=>'editor1@test.com',
            'phone'=>'0712349739367',
            'address'=>'Kenya',
            'role'=>'editor',
            'password'=>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name'=>'editor2',
            'email'=>'editor2@test.com',
            'phone'=>'0712347734567',
            'address'=>'Kenya',
            'role'=>'editor',
            'password'=>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name'=>'editor3',
            'email'=>'editor3@test.com',
            'phone'=>'071234474474567',
            'address'=>'Kenya',
            'role'=>'editor',
            'password'=>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name'=>'editor4',
            'email'=>'editor4@test.com',
            'phone'=>'071230765444567',
            'address'=>'Kenya',
            'role'=>'editor',
            'password'=>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name'=>'editor5',
            'email'=>'editor5@test.com',
            'phone'=>'07123448965567',
            'address'=>'Kenya',
            'role'=>'editor',
            'password'=>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name'=>'editor6',
            'email'=>'editor6@test.com',
            'phone'=>'0712344444567',
            'address'=>'Kenya',
            'role'=>'editor',
            'password'=>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
       //End of Dummy Editors

      //Dummy Users
      DB::table('users')->insert([
        'name'=>'user1',
        'email'=>'user1@test.com',
        'phone'=>'07123777777',
        'address'=>'Kenya',
        'role'=>'user',
        'password'=>Hash::make('12345678'),
        'remember_token' => Str::random(10),
    ]);
    DB::table('users')->insert([
        'name'=>'user2',
        'email'=>'user2@test.com',
        'phone'=>'071249326934567',
        'address'=>'Kenya',
        'role'=>'user',
        'password'=>Hash::make('12345678'),
        'remember_token' => Str::random(10),
    ]);

    DB::table('users')->insert([
        'name'=>'user3',
        'email'=>'user3@test.com',
        'phone'=>'0712349577945',
        'address'=>'Kenya',
        'role'=>'user',
        'password'=>Hash::make('12345678'),
        'remember_token' => Str::random(10),
    ]);

    DB::table('users')->insert([
        'name'=>'user4',
        'email'=>'user4@test.com',
        'phone'=>'071234482902567',
        'address'=>'Kenya',
        'role'=>'user',
        'password'=>Hash::make('12345678'),
        'remember_token' => Str::random(10),
    ]);

    DB::table('users')->insert([
        'name'=>'user5',
        'email'=>'user5@test.com',
        'phone'=>'0712343949567',
        'address'=>'Kenya',
        'role'=>'user',
        'password'=>Hash::make('12345678'),
        'remember_token' => Str::random(10),
    ]);

    DB::table('users')->insert([
        'name'=>'user6',
        'email'=>'user6@test.com',
        'phone'=>'071234982934567',
        'address'=>'Kenya',
        'role'=>'user',
        'password'=>Hash::make('12345678'),
        'remember_token' => Str::random(10),
    ]);

    DB::table('users')->insert([
        'name'=>'user7',
        'email'=>'user7@test.com',
        'phone'=>'071234738324567',
        'address'=>'Kenya',
        'role'=>'user',
        'password'=>Hash::make('12345678'),
        'remember_token' => Str::random(10),
    ]);

    DB::table('users')->insert([
        'name'=>'user8',
        'email'=>'user8@test.com',
        'phone'=>'071234420027',
        'address'=>'Kenya',
        'role'=>'user',
        'password'=>Hash::make('12345678'),
        'remember_token' => Str::random(10),
    ]);

    DB::table('users')->insert([
        'name'=>'user9',
        'email'=>'user9@test.com',
        'phone'=>'071232345467',
        'address'=>'Kenya',
        'role'=>'user',
        'password'=>Hash::make('12345678'),
        'remember_token' => Str::random(10),
    ]);

    DB::table('users')->insert([
        'name'=>'user10',
        'email'=>'user10@test.com',
        'phone'=>'0712344963567',
        'address'=>'Kenya',
        'role'=>'user',
        'password'=>Hash::make('12345678'),
        'remember_token' => Str::random(10),
    ]);

    DB::table('users')->insert([
        'name'=>'user11',
        'email'=>'user11@test.com',
        'phone'=>'07123465946',
        'address'=>'Kenya',
        'role'=>'user',
        'password'=>Hash::make('12345678'),
        'remember_token' => Str::random(10),
    
    ]);
  //End of Dummy Users
 
        
        
       
    }
}
