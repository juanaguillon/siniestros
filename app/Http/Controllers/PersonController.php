<?php

namespace App\Http\Controllers;

use App\Models\PersonModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
	public function create(Request $request)
	{
		$messsages = array(
			"person_email.unique" => "El email ingresado ya está en uso, intente con uno distinto"
		);

		$keys = array(
			"person_email" => "required|string|unique:sins_persons",
			"person_phone" => "numeric",
			"person_address" => "string",
			"person_city" => "required|string",
		);

		$validator = Validator::make($request->all(), $keys, $messsages);
		try {
			if ($validator->fails()) {
				throw new Exception($validator->errors()->first());
			}

			$personModel = new PersonModel();
			$created = $personModel->create($request->all(array_keys($keys)));

			if ($created) {
				return response()->json(array(
					"message" => "Se ha creado correctamente la nueva persona.",
					"error" => false
				));
			} else {
				throw new Exception("Error al crear la nueva persona, intente nuevamente.");
			}
		} catch (\Throwable $th) {
			return response()->json(array(
				"error" => true,
				"message" => $th->getMessage()
			));
		}
	}
}
