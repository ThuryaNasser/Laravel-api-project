<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResponseWithMessage extends JsonResource
{
    private $msg;

    function __construct($resource, $msg = '') {
        parent::__construct($resource);
        $this->msg = $msg;
    }
    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'message'   =>  $this->msg,
            'post'      =>  new PostResources($this),
        ];
    }
}
