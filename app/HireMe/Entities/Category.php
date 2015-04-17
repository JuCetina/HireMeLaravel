<?php namespace HireMe\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	public function candidates()
	{
		return $this->hasMany('HireMe\Entities\Candidate');
	}

	public function getPaginateCandidatesAttribute()
    {
        return Candidate::where('category_id', $this->id)->paginate(10);
    }
}
