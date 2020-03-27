<?php

namespace App\Http\Controllers;

use App\Models\PolicyModel as ModelsPolicyModel;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PolicyController extends Controller
{

	/**
	 * POST /api/policy/create
	 * Crear una nueva póliza
	 * @param Request $request
	 * @return void
	 */
	public function create(Request $request)
	{
		$keys = array(
			"policy_code" => array(
				"required",
				Rule::in(["VD", "RA", "CO"])
			),
			"policy_insure" => "numeric", // Aseguradora responsable
			"policy_percentaje" => "numeric|gt:0|lt:100",
			"policy_responsable" => "required|string", // Nombre de Responsable
			"policy_company" => "required|numeric",
			"policy_person" => "required|numeric",
			"policy_details" => "",
			"policy_secure_value" => "required|numeric",
			"policy_deductible" => "required|numeric|gt:0|lt:100", // Valor Asegurado
			"policy_limits" => "numeric",
		);

		$validate = Validator::make($request->all(), $keys);

		try {
			if ($validate->fails()) {
				throw new Error($validate->errors()->first());
			}

			$policyModel = new ModelsPolicyModel();

			$dataSave = $request->all(array_keys($keys));

			if ($policyModel->create($dataSave)) {
				return response()->json(array(
					"error" => false,
					"message" => "Póliza creada correctamente"
				));
			} else {
				throw new Error("No se ha creado la nueva póliza, intente nuevamente");
			}
		} catch (\Throwable $th) {
			return response()->json(array(
				"error" => true,
				"message" => $th->getMessage()
			));
		}
	}

	/**
	 * GET /api/policy/all
	 *	Obtener todas las polizas creadas
	 */
	public function getAllPolicies()
	{
		$policyModel = new ModelsPolicyModel();
		return response()->json($policyModel->all());
	}

	/**
	 * GET /api/policy/get/{policyid}
	 * Obtener una poliza en especifico por ID
	 */
	public function getById($policyid)
	{
		$policyModel = new ModelsPolicyModel();
		return response()->json($policyModel->find($policyid));
	}
}
