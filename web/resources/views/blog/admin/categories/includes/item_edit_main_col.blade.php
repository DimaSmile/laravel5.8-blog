@php
/** @var \App\Models\BlogCategory $item */
@endphp

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Title</div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
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
                            <label for="slug">Идентификатор</label>
                            <input value="{{ $item->slug}}"
                                id="slug"
                                type="text"
                                name="slug"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Родитель</label>
                            <select id="parent_id"
                                    type="text"
                                    name="parent_id"
                                    class="form-control"
                                    placeholder="Выбери категорию"
                                    required >
                                @foreach ($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}" @if ($categoryOption->id == $item->parent_id) selected @endif >
                                        {{-- {{ $categoryOption->id }}. {{$categoryOption->title}} --}}
                                        {{$categoryOption->id_title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea name="description"
                                        class="form-control"
                                        rows="3">{{ old('description', $item->description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>