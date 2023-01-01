<?php

namespace Neon\Models\Traits;

/** 
 * Define UUID trait. This trait will overwrite booting function, to set up 
 * primary key's default value to be an UUID.
 * 
 * @author: Balázs Ercsey <balazs.ercsey@elementary-interactive.com>
 */
trait Uuid
{
    /** Initialize UUID trait.
     * 
     * @return void
     */
    protected function initializeUuid(): void
    {
        /** Set incrementing to false, as we do not need auto incrementing value.
         * 
         * @var boolean
         */
        $this->incrementing = false;

        /** Set key type to string.
         * 
         * @var string
         */
        $this->keyType      = 'string';
    }

    /** Booting UUID trait.
     * 
     */
    protected static function bootUuid(): void
    {
        /** Define an event handler on 'creating' event, what means before the 
         * first save, to generate a UUID for this given model.
         */
        static::creating(function (\Illuminate\Database\Eloquent\Model $model)
        {
            if (!$model->getKey())
            {
                $model->{$model->getKeyName()} = (string) \Str::uuid();
            }
        });
    }
}
