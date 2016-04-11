<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model {

	/**
	 * The name of the table in the database
	 * @var string
	 */
	protected $table = 'faculty.entity_user';
	/**
	 * The primary key in the table
	 * @var string
	 */
	protected $primaryKey = 'parent_entities_id';
	protected $fillable = [];

	/**
	 * Returns the Person records associated with this Committee.
	 *
	 * @return Builder|Model
	 */
	public function people()
	{
		return $this->belongsToMany('App\Models\Person', 'nemo.memberships', 'parent_entities_id', 'individuals_id')
			->withPivot('role_position', 'description', 'member_status')
			->where('nemo.memberships.confidential', 0); // make sure "confidential" records are not included
	}
}