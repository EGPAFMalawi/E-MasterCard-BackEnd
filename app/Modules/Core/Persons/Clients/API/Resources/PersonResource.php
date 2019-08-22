<?php

namespace App\Modules\Core\Persons\Clients\API\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\Resource;

class PersonResource extends Resource
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
            'object' => 'PersonResource',
            'person_id' => $this->person_id,
            'personName' => [
                'prefix' => $this->preferredName->prefix,
                'given' => $this->preferredName->given_name,
                'middle' => $this->preferredName->middle_name,
                'family' => $this->preferredName->family_name,
            ],
            'personAddress' => [
                'cityVillage' => $this->preferredAddress->city_village,
                'countyDistrict' => $this->preferredAddress->county_district,
                'region' => $this->preferredAddress->region,
                'townshipDivision' => $this->preferredAddress->township_division,
            ],
            'gender' => $this->gender,
            'birthdate' => is_null($this->birthdate)? null : Carbon::parse($this->birthdate)->format('Y-m-d'),
            'birthdateEstimated' => $this->birthdate_estimated,
            'outcomeDetails' => $this->outcome_details,
            'dead' => isset($this->outcome_details['outcome'])? ($this->outcome_details['outcome'] == 'D'):false,
            'causeOfDeath' => $this->cause_of_death,

            'dateCreated' => $this->date_created,
            'uuid' => $this->uuid
        ];
    }
}
