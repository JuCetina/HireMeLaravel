<?php namespace App\Http\Controllers;

use HireMe\Repositories\CategoryRepo;
use HireMe\Repositories\CandidateRepo;

class CandidatesController extends Controller {

	protected $categoryRepo;
	protected $candidateRepo;

	public function __construct(CategoryRepo $categoryRepo, CandidateRepo $candidateRepo)
	{
		$this->categoryRepo = $categoryRepo;
		$this->candidateRepo = $candidateRepo;
	}

	public function category($slug, $id)
	{
		$category = $this->categoryRepo->find($id);

		if(!$category) \App::abort(404);

		return view('candidates/category', compact('category'));
	}

	public function show($slug, $id)
	{
		$candidate = $this->candidateRepo->find($id);

		if(!$candidate) \App::abort(404);
		
		return view('candidates/show', compact('candidate'));
	}
}
