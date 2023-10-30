<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->companyId,
            'companyName' => $this->companyName,
            'companyRegistrationNumber' => $this->companyRegistrationNumber,
            'companyFoundationDate' => $this->companyFoundationDate,
            'country' => $this->country,
            'zipCode' => $this->zipCode,
            'city' => $this->city,
            'streetAddress' => $this->streetAddress,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'companyOwner' => $this->companyOwner,
            'employees' => $this->employees,
            'activity' => $this->activity,
            'active' => $this->active,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
