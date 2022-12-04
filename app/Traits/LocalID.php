<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;


trait LocalID
{

    public static function getLID(int $size)
    {
        $id = self::generateLID($size);
        while(self::validateLID($id, $size) == false){
            $id = self::generateLID($size);
        }

        return $id;
    }

    private static function generateLID(int $size)
    {
        $output = '';

        for ($i=0;$i<$size;$i++){
            $output .= (string) rand(0,9);
        }

        return $output;
    }

    private static function validateLID(string $output, int $size): bool
    {
        $value = new Collection();
        $value->local_id = $output;
        $validator = Validator::make(array($value), [
            'local_id' => 'unique:clients|max:'.$size
        ]);
        if($validator->fails()){
            return false;
        }
        return true;
    }
}