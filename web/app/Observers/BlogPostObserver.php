<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;

class BlogPostObserver
{
    /**
     * Handle the models blog post "created" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "creating" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function creating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);

        $this->setSlug($blogPost);

        $this->setHtml($blogPost);

        $this->setUser($blogPost);
    }

    /**
     * Handle the models blog post "updated" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "deleting" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function deleting(BlogPost $blogPost)
    {
        // dd(__METHOD__, $blogPost);
        // return false;
    }

    /**
     * Handle the models blog post "deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        // dd(__METHOD__, $blogPost);
    }

    /**
     * Handle the models blog post "restored" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "force deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Обработка перед обновлением записи
     *
     * @param BlogPost $blogPost
     */
    public function updating(BlogPost $blogPost)
    {
        // $test[] = $blogPost->isDirty();
        // $test[] = $blogPost->isDirty('is_published');
        // $test[] = $blogPost->isDirty('user_id');
        // $test[] = $blogPost->getAttribute('is_published');
        // $test[] = $blogPost->is_published;
        // $test[] = $blogPost->getOriginal('is_published');
        // dd($test);

        $this->setPublishedAt($blogPost);

        $this->setSlug($blogPost);
    }

    /**
     * Если дата публикации не установлена и происходит установка флага - Опубликовано,
     * то устанавливаем дату публикации на текущую.
     *
     * @param BlogPost $blogPost
     */
    protected function setPublishedAt(BlogPost $blogPost)
    {
        $needSetPublished = empty($blogPost->published_at) && $blogPost->is_published;
        if ($needSetPublished) {
            $blogPost->published_at = Carbon::now();
        }
    }

    /**
     * Если поле слаг не установлено, то заполняем его конвертацией заголовка.
     *
     * @param BlogPost $blogPost
     */
    protected function setSlug(BlogPost $blogPost)
    {
        if (empty($blogPost->slug)){
            $blogPost->slug = \Str::slug($blogPost->title);
        }
    }

    /**
     * Установка значения полю content_html относительно поля content_raw
     * 
     * @param BlogPost $blogPost
     */
    protected function setHtml(BlogPost $blogPost)
    {
        if ($blogPost->isDirty('content_raw')) {
            // Тут должна быть генерация markdown->html
            $blogPost->content_html = $blogPost->content_raw;
        }
    }

    /**
     * Если не указан user_id, то устанавливаем пользователя по умолчанию.
     *
     * @param BlogPost $blogPost
     */
    protected function setUser(BlogPost $blogPost)
    {
        $blogPost->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;
    }
}
