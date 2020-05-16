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
			"sinister_date" => "required|date_format:Y-m-d H:i:s",
			"sinister_noticed" => "required|date_format:Y-m-d H:i:s",
			"sinister_presented" => "required|date_format:Y-m-d H:i:s",
			"sinister_datepact" => "required|date_format:Y-m-d",
			"sinister_pretention" => "required|numeric",
			"sinister_reservation" => "required|numeric",
		);

		$validate = Validator::make($request->all(), $keys);

		try {

			if ($validate->fails()) {
				throw new Error($validate->errors()->first());
			}

			$sinisterModel = new SinisterModel();
			$dataSave = array_merge(
				$request->all(array_keys($keys)),
				array(
					'sinister_status' => '0'
				)
			);

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


	/**
	 * GET /api/sinister/all
	 * Obtener todos los siniestros registrados
	 *
	 * @return void
	 */
	public function getAll()
	{
		return response()->json(SinisterModel::all());
	}

	/**
	 * GET /api/sinister/get/{sinisterid}
	 * Obtener un siniestro por ID
	 */
	public function getById($sinisterid)
	{
		$foundSin = SinisterModel::find($sinisterid);
		return response()->json($foundSin);
	}

	/**
	 * Actualizar un siniestro en especifico
	 *
	 * @param Request $request
	 * @return void
	 */
	public function update(Request $request, $sinisterid)
	{
		$keys = array(
			"sinister_policy" => "required|numeric",
			"sinister_person" => "required|numeric",
			"sinister_place" => "required|string",
			"sinister_date" => "required|date_format:Y-m-d H:i:s",
			"sinister_noticed" => "required|date_format:Y-m-d H:i:s",
			"sinister_presented" => "required|date_format:Y-m-d H:i:s",
			"sinister_datepact" => "required|date_format:Y-m-d",
			"sinister_pretention" => "required|numeric",
			"sinister_reservation" => "required|numeric",
		);

		$validate = Validator::make($request->all(), $keys);
	}
}
