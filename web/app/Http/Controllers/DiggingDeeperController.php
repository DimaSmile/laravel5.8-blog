<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiggingDeeperController extends Controller
{

    /**
     * Базовая информация
     * @url https://laravel.com/docs/5.8/collections
     *
     * Справочная информация
     * @url https://laravel.com/api/6.x/Illuminate/Support/Collection.html
     *
     * Вариант коллекции для модели eloquent
     * @url https://laravel.com/api/6.x/Illuminate/Database/Eloquent/Collection.html
     *
     * билдер запросов то с чем можно перепутать коллекции
     * @url https://laravel.com/docs/5.8/queries
     */
    public function collections()
    {
        $result = [];

        /**
         * @var \Illuminate\Database\Eloquent\Collection $eloquentCollection
         */
        $eloquentCollection = BlogPost::withTrashed()->get();
        // $eloquentCollection = BlogPost::onlyTrashed()->get();

        // dd(__METHOD__, $eloquentCollection, $eloquentCollection->toArray());

        $collection = collect($eloquentCollection->toArray());

        // dd(
        //     get_class($collection),
        //     get_class($eloquentCollection),
        //     $collection
        // );

        // $result['first'] = $collection->first();
        // $result['last'] = $collection->last();
        // $result['where']['data'] = $collection
        //     ->where('category_id', 10)
        //     ->values() //обнуляет ключи
        //     ->keyBy('id');//устанавливает ключи массива id-ком записи

        // $result['where']['count'] = $result['where']['data']->count();//количество элементов в коллекции
        // $result['where']['isEmpty'] = $result['where']['data']->isEmpty();//пустая ли выборка
        // $result['where']['isNotEmpty'] = $result['where']['data']->isNotEmpty();//не пустая коллекция


        //не красиво
        // if ($result['where']['count']) {
        
        // }

        //делать лучше так
        // if ($result['where']['data']->isEmpty()) {
        
        // }

        // $result['whereFirst'] = $collection
        //     ->firstWhere('created_at', '>', '2019-09-29 14:02:30');

        //базовая версия не измениться. Просто вернеться измененная версия:
        //т.е оставляет старую коллекцию прежней и возвращает новую коллекцию
        $result['map']['all'] = $collection->map(function ($item) {
            $newItem = new \stdClass();
            $newItem->item_id = $item['id'];
            $newItem->item_title = $item['title'];
            $newItem->exists = is_null($item['deleted_at']);
            return $newItem;
        });
        // dd($collection);//не изменилась

        //тоже самое что и map только изменяет старую коллекцию
        $result['map']['all'] = $collection->transform(function ($item) {
            $newItem = new \stdClass();
            $newItem->item_id = $item['id'];
            $newItem->item_title = $item['title'];
            $newItem->exists = is_null($item['deleted_at']);
            $newItem->created_at = Carbon::parse($item['created_at']);

            return $newItem;
        });
        // dd($collection);//изменилась

        // $result['notExists'] = $result['map']['all']
        //     ->where('exists', '=', false)
        //     ->values() //обнуляет ключи
            ;
        // dd($result);

        $newItem = new \stdClass();
        $newItem->id = 99999;

        $newItem2 = new \stdClass();
        $newItem2->id = 88888;
        // dd($newItem, $newItem2);

        // установить элемент в начало коллекции
        // $collection->prepend($newItem)->first();//добавить элемент в начало коллекции
        // $collection->push($newItem2)->last();//добавить элемент в конец коллекции
        // dd($collection);
        // $newItemFirst = $collection->prepend($newItem)->first();//меняет коллекцию
        // $newItemLast = $collection->push($newItem2)->last();//меняет коллекцию
        // $pulledItem = $collection->pull(10);//забрать десятый элемент, удаляет из коллекции элемент и возвращает его

        // dd(compact('collection', 'newItemFirst', 'newItemLast', 'pulledItem'));

        // филтрация, замена orWhere
        // $filtered = $collection->filter(function ($item){
        //     $byDay = $item->created_at->isFriday();
        //     $byDate = $item->created_at->day == 9;

        //     // $result = $item->created_at->isFriday() && ($item->created_at->day == 11);
        //     $result = $byDay && $byDate;

        //     return $result;
        // });

        // dd(compact('filtered'));

        $sortedSimpleCollection = collect([5, 3, 1, 4, 6, 2])->sort();//делает значения ключами и сортирует по порядку значения
        $sortedSimpleCollectionClearKeys = collect([5, 3, 1, 4, 6, 2])->sort()->values();//назначает новые ключи по порядку(сбрасывает ключи)
        $sortedAscCollection = $collection->sortBy('created_at');//от меньшего к большему
        $sortedDescCollection = $collection->sortByDesc('item_id');

        dd(compact('sortedSimpleCollection', 'sortedSimpleCollectionClearKeys', 'sortedAscCollection', 'sortedDescCollection'));
    }
}
