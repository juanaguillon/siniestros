<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PolicyModel extends Model
{
    protected $fillable = array(
        "policy_responsable",
        "policy_company",
        "policy_person",
        "policy_details",
        "policy_secure_value",
        "policy_deductible",
        "policy_code",
        "policy_percentaje",
        "policy_insure",
        // "policy_limits",
    );

    const CREATED_AT = "policy_created";
    const UPDATED_AT = "policy_updated";

    public $table = "sins_policies";
    public $primaryKey = "policy_id";
}
