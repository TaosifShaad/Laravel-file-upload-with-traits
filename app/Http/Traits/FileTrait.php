<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait FileTrait {
    public function upload($value, $path) {
        $fileName = $value->getClientOriginalName();
        $value->storeAs(
            $path, $fileName
        );

        return $path.$fileName;
    }
}
