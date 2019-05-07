<?php

namespace App\Modules\Core\TraditionalAuthorities\Data\Repositories;

use App\Modules\Core\TraditionalAuthorities\Data\Models\TraditionalAuthority;

class TraditionalAuthorityRepository {

    public function getAll()
    {
        return TraditionalAuthority::all();
    }

    public function get($id)
    {
        return TraditionalAuthority::find($id);
    }

    public function getBy($field, $value)
    {
        return TraditionalAuthority::where($field, $value)->first();
    }
}