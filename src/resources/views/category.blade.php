@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
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

            <div class="make-category">
                <div class="make-category__content">
                    <form class="make-category__content__form" action="/categories" method="post">
                    @csrf
                        <input class="make-category__content__text" type="text">
                        <button class="make-category__content__button" type="submit">作成</button>
                    </form>

                    <div class="category-table">
                        <table class="category-table__inner">
                            <th class="category-table__header">
                                <span class="category-table__header-span">カテゴリ</span>
                            </th>
                            @foreach ($categories as $Category)
                    <tr class="category-table__row">
                        <td class="category-table__item">
                            <form class="update-form">
                             {{-- action="/categories/update" method="post"> --}}
                            {{-- @method('PATCH') --}}
                            {{-- @csrf --}}
                                <div class="update-form__item">
                                    <input class="update-form__item-input" type="text">
                                     {{-- name="content" value="{{ $Category['name'] }}"> --}}
                                </div>

                                <div class="update-form__button">
                                    <button class="update-form__button-submit" type="submit">更新</button>
                                </div>
                            </form>
                        </td>
                        <td class="category-table__item">
                            <form class="delete-form">
                             {{-- action="/categories/delete" method="post"> --}}
                            {{-- @method('DELETE') --}}
                            {{-- @csrf --}}
                                <div class="delete-form__button">
                                    <button class="delete-form__button-submit" type="submit">削除</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach