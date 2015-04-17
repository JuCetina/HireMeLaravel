<?php namespace HireMe\Entities;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Hash;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract{
	
	use Authenticatable, CanResetPassword;

	protected $fillable = array('full_name', 'email', 'password');

	public function candidate()
    {
        return $this->hasOne('HireMe\Entities\Candidate', 'id', 'id');
    }

    public function getCandidate()
    {
        $candidate = $this->candidate;


        if (is_null ($candidate))
        {
            $candidate = new Candidate();
            $candidate->id = $this->id;
        }

        return $candidate;
    }

	public function setPasswordAttribute($value)
	{
		if(!empty($value))
		{
			$this->attributes['password'] = Hash::make($value);
		}
	}
}
