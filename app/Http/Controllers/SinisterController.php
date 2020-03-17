<?php

namespace App\Http\Controllers;

use App\Models\SinisterModel;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SinisterController extends Controller
{
	/**
	 * POST /api/sinister/create
	 * Crear un nuevo registro de siniestro
	 *
	 * @param Request $request
	 * @return void
	 */
	public function create(Request $request)
	{
		$keys = array(
			"sinister_policy" => "required|numeric",
			"sinister_person" => "required|numeric",
			"sinister_place" => "required|string",
			"sinister_noticed" => "required|date_format:Y-m-d H:i:s",
			"sinister_presented" => "required|date_format:Y-m-d H:i:s",
			"sinister_datepact" => "required|date_format:Y-m-d",
			"sinister_pretention" => "required|numeric",
			"sinister_reservation" => "required|numeric",
			"sinister_status" =>  array(
				"required",
				Rule::in(range(0, 5))
			)
		);

		$validate = Validator::make($request->all(), $keys);

		try {

			if ($validate->fails()) {
				throw new Error($validate->errors()->first());
			}

			$sinisterModel = new SinisterModel();
			$dataSave = $request->all(array_keys($keys));
			$isSaved = $sinisterModel->create($dataSave);

			if ($isSaved) {
				return response()->json(array(
					"error" => false,
					"message" => "Se ha creado correctamente el nuevo siniestro."
				));
			} else {
				throw new Error("No se ha podido crear el nuevo siniestro, intente nuevamente.");
			}
		} catch (\Throwable $th) {
			return response()->json(array(
				"error" => true,
				"message" => $th->getMessage()
			));
		}
	}
}
