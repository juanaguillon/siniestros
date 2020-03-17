<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonModel extends Model
{
	protected $fillable = array(
		"person_email",
		"person_phone",
		"person_address",
		"person_city",
	);

	const CREATED_AT = "person_created";
	const UPDATED_AT = "person_updated";

	public $table = "sins_persons";
	public $primaryKey = "person_id";
}
