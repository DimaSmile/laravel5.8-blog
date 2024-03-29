@php
/** @var \App\Models\BlogPost $item */
@endphp

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if ($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#additionaldata" role="tab">Доп. данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input value="{{ $item->title}}"
                                id="title"
                                type="text"
                                name="title"
                                class="form-control"
                                minlength="3"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="content_raw">Статья</label>
                            <textarea name="content_raw"
                                      id="content_raw"
                                      class="form-control"
                                      rows="20">{{ old('content_raw', $item->content_raw) }}</textarea>
                        </div>
                    </div>

                    <div class="tab-pane" id="additionaldata" role="tabpanel">

                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select id="category_id"
                                    type="text"
                                    name="category_id"
                                    class="form-control"
                                    placeholder="Выбери категорию"
                                    required >
                                @foreach ($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}" @if ($categoryOption->id == $item->category_id) selected @endif >
                                        {{-- {{ $categoryOption->id }}. {{$categoryOption->title}} --}}
                                        {{$categoryOption->id_title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input value="{{ $item->slug}}"
                                id="slug"
                                type="text"
                                name="slug"
                                class="form-control"
                                minlength="3">
                        </div>

                        <div class="form-group">
                            <label for="excerpt">Выдержка</label>
                            <textarea name="excerpt"
                                        class="form-control"
                                        rows="3">{{ old('excerpt', $item->excerpt) }}</textarea>
                        </div>

                        <div class="form-check">
                            <input name="is_published" type="hidden" value="0">
                            <div>
                                <input  id="is_published"
                                        type="checkbox" 
                                        name="is_published"
                                        class="form-check-input"
                                        value="1"
                                        @if ($item->is_published)
                                        checked="checked"
                                        @endif
                                        >
                                <label for="is_published">Опубликовано</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>