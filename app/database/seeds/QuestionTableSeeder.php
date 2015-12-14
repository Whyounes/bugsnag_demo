<?php 

use Neoos\Foto\Models\Question;

class QuestionTableSeeder extends Seeder {

    public function run()
    {
        DB::table('questions')->delete();

        Question::create(
        	[ 
        		'title' 	         => 'Editor not loading', 
        		'description' 	     => 'Hi, i\'m trying to load the pictures editor but it\'s not working. can please help?',
        		'active'	         => 1,
                'user_id'           => 1
        	]
        );

        Question::create(
            [ 
                'title'              => 'Invoice cannot be downloaded', 
                'description'        => 'Hi, I passed successfully a command, but i can\'t download the invoice for some reason.',
                'active'             => 1,
                'user_id'           => 1
            ]
        );
    }//run

}