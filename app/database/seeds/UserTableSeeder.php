<?php 

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(
            [ 
                'username'          => 'younesrafie', 
                'password'          => Hash::make('younes'),
                'active'            => 1,
                'role'              => 'user',
                'remember_token'    => ''
            ]
        );

        User::create(
        	[ 
        		'username' 	=> 'admin', 
        		'password' 	=> Hash::make('admin'),
        		'active'	=> 1,
        		'role' 		=> 'admin',
                'remember_token'    => ''
        	]
        );
    }//run

}