<?php

namespace LingfengChenCN\Eloquent\Traits;

use Ramsey\Uuid\Uuid;

trait UuidForKey
{
    /**
     * Stop  incrementing ID
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Hook 'creating'  method to set the key to be a UUID4 hex
     *
     * @return void
     */
    public static function bootUuidForKey()
    {
        static::creating(function ($model) {
            $model->incrementing = false;
            $model->attributes[$model->getKeyName()] = Uuid::uuid4()->getHex();
        });
    }
}