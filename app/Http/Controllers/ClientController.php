<?php

namespace App\Http\Controllers;

use App\Models\ClientModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
	/**
	 * POST /api/client/create
	 * Crear un nuevo cliente
	 *
	 * @param Request $request
	 * @return void
	 */
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
		$clientModel::create($request->all(array_keys($keys)));

		if ($clientModel) {
			return response()->json(array(
				"error" => false,
				"message" => "Cliente creado correctamente."
			));
		} else {
			return response()->json(array(
				"error" => true,
				"message" => "Error al crear el nuevo cliente, intente nuevamente."
			));
		}
	}

	/**
	 * POST /api/client/update/${clientid}
	 * Actualizar un cliente por ID
	 * @param integer $clientid
	 */
	public function updateById(Request $request, $clientid)
	{

		$keys = array(
			"client_name" => "required|string",
			"client_address" => "required|string",
			"client_contact_person" => "required|string",
			"client_phone" => "required|numeric"
		);

		$validator = Validator::make($request->all(), $keys);

		try {
			if ($validator->fails()) {
				throw new \Error($validator->errors()->first());
			}

			$getClient = ClientModel::find($clientid);

			if (!$getClient) {
				throw new \Error("El cliente solicitado no se ha encontrado");
			}
			$updated = $getClient->update($request->all(array_keys($keys)));

			if ($updated) {
				return response()->json(array(
					'error' => false,
					"message" => "Se ha guardado los datos del cliente correctamente."
				));
			} else {
				throw new \Error("Ha ocurrido un error al actualizar el cliente. Intente nuevamente");
			}
		} catch (\Throwable $th) {
			return response()->json(array(
				"error" => true,
				"message" => $th->getMessage()
			));
		}
	}

	/**
	 * GET /api/client/get/{$clientid}
	 * Obtener los datos de un cliente en concreto por ID
	 * @param integer $clientid 
	 * @return void
	 */
	public function getById($clientid)
	{
		$client = ClientModel::find($clientid);

		if (!$client) {
			return response()->json(array(
				"error" => true,
				'message' => "No se ha encontrado el cliente solicitado."
			));
		} else {
			return response()->json($client);
		}
	}

	/**
	 * GET /api/client/all
	 * Obtener todos los clientes
	 *
	 * @return void
	 */
	public function getClients()
	{
		$clientModel = new ClientModel();
		return response()->json($clientModel->all());
	}
}
