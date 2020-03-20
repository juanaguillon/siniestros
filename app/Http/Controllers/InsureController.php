<?php

namespace App\Http\Controllers;

use App\Models\InsureModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InsureController extends Controller
{
	/**
	 * POST /api/insure/create
	 * Crear una nueva aseguradora
	 * @param Request $request
	 */
	public function create(Request $request)
	{

		$messages = array(
			"insure_nit.unique" => "El nit ingresado ya fue registrado anteriormente, intente con uno distinto"
		);
		$keys = array(
			"insure_name" => "required|string",
			"insure_nit" => "required|string|unique:sins_insures",
			"insure_social" => array(
				"required",
				Rule::in(["LTDA", "SA", "CIA", "SC", "SCA", "SAS", "COL"])
			),
		);

		$validator = validator($request->all(), $keys, $messages);

		try {
			if ($validator->fails()) {
				throw new Exception($validator->errors()->first());
			}

			$insureModel = new InsureModel();
			$created = $insureModel->create($request->all(array_keys($keys)));

			if ($created) {
				return response()->json(array(
					"error" => false,
					"message" => "Se ha creado la nueva aseguradora correctamente."
				));
			} else {
				throw new Exception("No se ha logrado crear la nueva aseguradora, intente nuevamente.");
			}
		} catch (\Throwable $th) {
			return response()->json(array(
				"error" => true,
				"message" => $th->getMessage()
			));
		}
	}

	public function getAll(){
		$insureModel = new InsureModel();
		return $insureModel->all();
	}
}
