<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Modelimplements StaplerableInterface
{
	use EloquentTrait;
    protected $table = 'room';

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('image', [
            'styles' => [
                'medium' => '300x300',
                'thumb' => '100x100'
            ]
        ]);

        parent::__construct($attributes);
    }
}