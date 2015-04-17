<?php namespace App\Http\Controllers;

use HireMe\Repositories\CandidateRepo;

class HomeController extends Controller {

	protected $candidateRepo;

	public function __construct(CandidateRepo $candidateRepo)
	{	
		$this->candidateRepo = $candidateRepo;
	}

	public function index()
	{

		$latest_candidates = $this->candidateRepo->findLatest();

		return view('home', compact('latest_candidates'));
	}
}
