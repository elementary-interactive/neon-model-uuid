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

    
    /** As because we use UUID as primary key, we don't need auto incrementing a stupid integer.
     *
     * @return bool
     */
    public function getIncrementing(): bool
    {
        return false;
    }

    /** The type of the auto incrementing identifier
     *
     * @return string
     */
    public function getKeyType(): string
    {
        return 'string';
    }
}
