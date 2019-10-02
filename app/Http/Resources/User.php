<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            "avatar" => $this->avatar,
            "name" => $this->name,
            "username" => $this->username,
            "email"  => $this->email,
            "email_verified_at"  => $this->email_verified_at,
            "permission" => $this->getDirectPermissions(),
            "all_permission" => $this->getAllPermissions(),
            "role" => $this->getRoleNames(),
            "created_at"  => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
