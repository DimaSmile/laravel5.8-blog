<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{

    use SoftDeletes;

    const ROOT = 1;

    protected $fillable = 
        [
            'title',
            'slug',
            'parent_id',
            'description',
        ];

    /**
     * Получить родительскую категорию
     *
     * @return BlogCategory
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     * Пример акксесора(Accessor)
     *
     * @return string
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
                ? 'Корень'
                : '???');

        return $title;
    }

    /**
     * Являеться ли текущая директория корневой
     *
     * @return boolean
     */
    public function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }

    /**
     * Пример аксесуара
     *
     * исполняется когда мы берем значение аттрибута(свойства) из объекта модели 
     * $model->title;
     *
     * @param string $valueFromObject
     * @return bool|mixed|null|string|string[]
     */
    public function getTitleAttribute($valueFromObject)
    {
        return mb_strtoupper($valueFromObject);
    }

    /**
     * Пример мутатора
     * исполняется когда мы устанавливаем новое значение аттрибуту(свойству) из объекта модели
     * $model->title = 'new value';
     *
     * @param string $valueFromObject
     */
    public function setTitleAttribute($incomingValue)
    {
        $this->attributes['title'] = strtolower($incomingValue);
    }
}
