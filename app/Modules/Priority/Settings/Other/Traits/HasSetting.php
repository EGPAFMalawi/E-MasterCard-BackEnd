<?php


namespace App\Modules\Priority\Settings\Other\Traits;

use App\Modules\Priority\Settings\Data\Models\Setting;

/**
 *
 */
trait HasSetting
{
  public function setting()
  {
    return $this->hasOne(Setting::class);
  }
}
