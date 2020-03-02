<?php

namespace App\Http\Controllers;

use App\Models\ClientModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
	public function create(Request $request)
	{

		$keys = array(
			"client_name" => "required|string",
			"client_address" => "required|string",
			"client_nit" => "required|numeric",
			"client_email" => "required|email|unique:sins_clients",
			"client_contact_person" => "required|string",
			"client_phone" => "required|numeric"
		);

		$customMessages = array(
			"client_email.unique" => "El email proporcionado ya está siendo usado, intente con uno distinto."
		);

		$validate = Validator::make($request->all(), $keys, $customMessages);
		if ($validate->fails()) {
			return response()->json(array(
				"error" => true,
				"message" => $validate->errors()->first()
			));
		}

		$clientModel = new ClientModel();
		$clientModel::create();

		if ($clientModel) {
			return response()->json(array(
				"error" => false,
				"message" => "Usuario creado correctamente."
			));
		} else {
			return response()->json(array(
				"error" => true,
				"message" => "Error al crear el nuevo usuario, intente nuevamente."
			));
		}
	}
}
