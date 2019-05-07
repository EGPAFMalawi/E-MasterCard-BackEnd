<?php

namespace App\Modules\Core\TraditionalAuthorities;

use App\Modules\Core\TraditionalAuthorities\Clients\API\Resources\TraditionalAuthorityResource;
use App\Modules\Core\TraditionalAuthorities\Data\Models\TraditionalAuthority;
use App\Modules\Core\TraditionalAuthorities\Data\Repositories\TraditionalAuthorityRepository;
use Illuminate\Support\Facades\App;

class TraditionalAuthorities{

    public static function repository()
    {
        return App::make(TraditionalAuthorityRepository::class);
    }

    public static function resource(TraditionalAuthority $traditionalAuthority)
    {
        return new TraditionalAuthorityResource($traditionalAuthority);
    }

    public static function resourceCollection($traditionalAuthorities)
    {
        return TraditionalAuthorityResource::collection($traditionalAuthorities);
    }

}