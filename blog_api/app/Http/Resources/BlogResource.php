<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request){
        return [
            'id' => $this->id,
            'user_id' => new UserResource($this->user),
            'body' => $this->body,
            'created_at' => date('Y-m-d h:i', strtotime($this->created_at)),
            'updated_at' => date('Y-m-d h:i', strtotime($this->updated_at)),
            'task_details' => new TaskDetailsResource($this->taskDetails)
        ];
    }
}
