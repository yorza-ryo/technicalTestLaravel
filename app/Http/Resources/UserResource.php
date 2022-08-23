<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'token' => $this['token'],
            'user' => [
                'email' => $this['user']['email'],
                'fname' => $this['userDetail']['fname'],
                'mname' => $this['userDetail']['mname'],
                'lname' => $this['userDetail']['lname'],
                'phone' => $this['userDetail']['phone'],
                'address' => $this['userDetail']['address'],
            ]
        ];
    }
}
