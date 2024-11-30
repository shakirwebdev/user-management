<?php

namespace App\Models\Concerns;

trait OnDeleteReplace
{
    public static function bootOnDeleteReplace(): void
    {
        /**
         * Listen for the deleting event on the user model.
         * Append 'deleted_at' at the end of email of deleted user
         */
        static::deleting(function ($model) {
            $attributes = [];
            foreach (self::$uniqueAttributes as $attribute) {
                $attributes[$attribute] = $model->{$attribute} . '_deleted_at_' . date('dmYHis');
            }

            $model->forceFill($attributes)->save();
        });
    }
}
