@extends('layouts.admin')
@section('content')
    <div class="p-[60px] flex flex-col gap-[40px] items-start">
        <a href="{{ route('admin.listes.index') }}" class="flex flex-row items-center gap-[10px]">
            <x-primary-button>Voir les listes</x-primary-button>
        </a>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="w-full">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-gray-900">Ma {{ __('Liste') }} de naissance</h1>

                            </div>

                        </div>

                        <div class="flow-root">
                            <div class="mt-8 overflow-x-auto">
                                <div class="max-w-xl py-2 align-middle">
                                    <form method="POST" action="{{ route('admin.listes.update', $liste->id) }}"  role="form" enctype="multipart/form-data">
                                        {{ method_field('PATCH') }}
                                        @csrf
                                        @include('admin.listes.form')
                                    </form>
                                </div>

                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection






