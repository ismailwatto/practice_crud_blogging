<?php
namespace App\Http\Traits;
trait Image
{
    function imageStore($image){
        return $image->store('public/images');
    }
}
?>