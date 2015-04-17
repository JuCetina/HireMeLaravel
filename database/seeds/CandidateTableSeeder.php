<?php

use Illuminate\Database\Seeder;
use HireMe\Entities\User as User;
use HireMe\Entities\Candidate as Candidate;
use Faker\Factory as Faker;

class CandidateTableSeeder extends Seeder 
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$faker = Faker::create();

		for($i = 0; $i < 80; $i++)
		{

			$fullname = $faker->name;

			$user = User::create(
			[
				'full_name' => $fullname,
				'email' 	=> $faker->email,
				'password' 	=> '123456',
				'type' 		=> 'candidate'
			]);

			Candidate::create(
			[
				'id' 			=> $user->id,
				'website_url' 	=> $faker->url,
				'description'	=> $faker->text(200),
				'job_type' 		=> $faker->randomElement(['full','partial','freelance']),
				'category_id'	=> $faker->randomElement([1, 2, 3]),
				'available'		=> true,
				'slug'			=> $faker->slug
			]);
		}
	}
}