<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsureModel extends Model
{
	protected $fillable = array(
		"insure_name",
		"insure_nit",
		"insure_social",
	);

	const CREATED_AT = "insure_created";
	const UPDATED_AT = "insure_updated";

	public $table = "sins_insures";
	public $primaryKey = "insure_id";
}
