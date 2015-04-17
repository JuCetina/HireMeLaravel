<?php namespace HireMe\Entities;

use Illuminate\Database\Eloquent\Model;
use Lang;

class Candidate extends Model {

	protected $fillable = ['website_url', 'description', 'job_type', 'category_id', 'available'];

	public function user()
	{
		return $this->hasOne('HireMe\Entities\User', 'id','id'); //El id del usuario es el mismo id de candidato
	}

	public function category()
	{
		return $this->belongsTo('HireMe\Entities\Category');
	}

	public function getJobTypeTitleAttribute()
	{
		return Lang::get('utils.job_types.'.$this->job_type);
	}

}
