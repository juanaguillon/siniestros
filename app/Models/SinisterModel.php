<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SinisterModel extends Model
{
	protected $fillable = array(
		"sinister_policy",
		"sinister_person",
		"sinister_place",
		"sinister_date",
		"sinister_noticed",
		"sinister_presented",
		"sinister_datepact",
		"sinister_pretention",
		"sinister_reservation",
		"sinister_status",
	);

	public $primaryKey = "sinister_id";
	public $table = "sins_sinisters";

	const CREATED_AT = "sinister_created";
	const UPDATED_AT = "sinister_updated";
}
