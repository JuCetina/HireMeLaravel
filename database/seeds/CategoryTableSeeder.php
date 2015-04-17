<?php

use Illuminate\Database\Seeder;
use HireMe\Entities\Category as Category;

class CategoryTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Category::create([

			'id' 		=> 1,
			'name' 	=> 'Backend developers',
			'slug' 		=> 'backend-developers'

		]);

		Category::create([

			'id' 		=> 2,
			'name' 	=> 'Frontend Developers',
			'slug' 		=> 'frontend-developers'
			
		]);

		Category::create([

			'id' 		=> 3,
			'name' 	=> 'Designers',
			'slug' 		=> 'designers'
			
		]);
	}
}