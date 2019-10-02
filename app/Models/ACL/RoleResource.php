<?php

namespace App\Models\Acl;

use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\Permission\Models\Role;
use App\User;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    { 
        return [
            "id" => $this->id,
            "name" => $this->name,
            "users" => User::whereHas('roles', function($q){ $q->where("name", $this->name); })->get(),
            "permissions" => Role::findById($this->id)->permissions,
            "created_at"  => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
