@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
            @if (session('message'))
                <a class="success-message">
                    {{ session('message') }}
                </a>
            @endif
            @if ($errors->any())
                <div class="danger-message">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

    {{-- <div class="todo__alert">
        @if(session('message'))
            <div class="todo__alert--success">
            {{ session('message') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="todo__alert--danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
    </div> --}}

            <div class="make-todo">
                <h2>新規作成</h2>
                <div class="make-todo__content">
                    <form class="make-todo__content__form" action="/todos" method="post">
                    @csrf
                        <input class="make-todo__content__text" type="text" name="content" value="{{ old('content') }}">
                        <select class="make-todo__content__category" name="category">
                            <option value="">カテゴリ</option>
                        </select>
                        <button class="make-todo__content__button" type="submit">作成</button>
                    </form>
                </div>
            </div>

            <div class="search-todo">
                <h2>Todo検索</h2>
                <div class="search-todo__content">
                    <form class="search-todo__content__form" action="/todos" method="post">
                    @csrf
                        <input class="search-todo__content__text" type="text" name="content">
                        <select class="search-todo__content__category">
                            <option value="">カテゴリ</option>
                        </select>
                        <button class="search-todo__content__button" type="submit">検索</button>
                    </form>
                </div>
            </div>


            {{-- <div class="todo-list"> --}}
            {{-- <ul> --}}
                {{-- <li> --}}
                    {{-- <a>Todo</a> --}}
                {{-- </li> --}}
                {{-- <li>test1 --}}
                    {{-- <div class="todo-list__content"> --}}
                    {{-- <span class="todo-content__update">更新</span> --}}
                    {{-- <span class="todo-content__delete">削除</span> --}}
                    {{-- </div>
                </li>

                <li>test2
                <div class="todo-list__content">
                    <span class="todo-content__update">更新</span>
                    <span class="todo-content__delete">削除</span>
                </div>
                </li>

                <li>#
                <div class="todo-list__content">
                    <span class="todo-content__update">更新</span>
                    <span class="todo-content__delete">削除</span>
                </div>
                </li>
            </ul>
        </div> --}}

        <div class="todo-table">
            <table class="todo-table__inner">
                <th class="todo-table__header">
                    <span class="todo-table__header-span">Todo</span>
                    <span class="todo-table__header-span">カテゴリ</span>
                </th>
                @foreach ($todos as $todo)
                    <tr class="todo-table__row">
                        <td class="todo-table__item">
                            <form class="update-form" action="/todos/update" method="post">
                            @method('PATCH')
                            @csrf
                                <div class="update-form__item">
                                    <input class="update-form__item-input" type="text" name="content" value="{{ $todo['content'] }}">
                                    <input type="hidden" name="id" value="{{ $todo['id'] }}">
                                    <div class="update-form__item">
                                        <p class="update-form__item-p">Category 1</p>
                                    </div>
                                    {{-- <div class="update-form__item-category">
                                        {{ $categories['name'] }}
                                    </div> --}}
                                </div>
                                <div class="update-form__button">
                                    <button class="update-form__button-submit" type="submit">更新</button>
                                </div>
                            </form>
                        </td>
                        <td class="todo-table__item">
                            <form class="delete-form" action="/todos/delete" method="post">
                            @method('DELETE')
                            @csrf
                                <div class="delete-form__button">
                                    <input type="hidden" name="id" value="{{ $todo['id'] }}">
                                    <button class="delete-form__button-submit" type="submit">削除</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                {{-- <tr class="todo-table__row">
                    <th class="todo-table__header">Todo</th>
                </tr>
                <tr class="todo-table__row">
                    <td class="todo-table__item">
                        <form class="update-form">
                            <div class="update-form__item">
                                <input class="update-form__item-input" type="text" name="content" value="">
                            </div>
                            <div class="update-form__button">
                                <button class="update-form__button-submit" type="submit">更新</button>
                            </div>
                        </form>
                    </td>
                    <td class="todo-table__item">
                        <form class="delete-form">
                            <div class="delete-form__button">
                                <button class="delete-form__button-submit" type="submit">削除</button>
                            </div>
                        </form>
                    </td>
                </tr>
                <tr class="todo-table__row">
                    <td class="todo-table__item">
                        <form class="update-form">
                            <div class="update-form__item">
                                <input class="update-form__item-input" type="text" name="content" value="test2">
                            </div>
                            <div class="update-form__button">
                                <button class="update-form__button-submit" type="submit">更新</button>
                            </div>
                        </form>
                    </td>
                    <td class="todo-table__item">
                        <form class="delete-form">
                            <div class="delete-form__button">
                                <button class="delete-form__button-submit" type="submit">削除</button>
                            </div>
                        </form>
                    </td>
                </tr> --}}
            </table>
        </div>

@endsection