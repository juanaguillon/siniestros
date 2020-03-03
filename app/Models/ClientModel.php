<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
	protected  $fillable  = array(
		"client_name",
		"client_address",
		"client_nit",
		"client_email",
		"client_contact_person",
		"client_phone"
	);
	public $table = "sins_clients";
	public $primaryKey = "client_id";
	const CREATED_AT = "client_created";
	const UPDATED_AT = "client_updated";
}
