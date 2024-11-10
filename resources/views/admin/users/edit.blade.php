    @extends('layouts.admin')

    @section('content')
    <h1>Modifier l'utilisateur</h1>
{{--
    <div class="flex items-center justify-center p-12">
        <!-- Author: FormBold Team -->
        <div class="mx-auto w-full max-w-[550px] bg-white">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <h1> {{$user->id}} </h1>
                <div class="mb-5">
                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                        Full Name
                    </label>
                    <input type="text" name="name" id="name" placeholder="Full Name" value="{{ $user->name }}" required
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                        Email Address
                    </label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" value="{{ $user->email }}"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div class="mb-5">
                    <label for="phone" class="mb-3 block text-base font-medium text-[#07074D]">
                        Phone Number
                    </label>
                    <input type="number" name="phone" id="phone" value="{{ $user->phone }}" placeholder="Enter your phone number"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>

                <div class="mb-5 pt-3">
                    <label class="mb-5 block text-base font-semibold text-[#07074D] sm:text-xl">
                        Address Details
                    </label>
                    <div class="-mx-3 flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <input type="text" name="country" id="country" placeholder="pays" value="{{ $user->country }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <input type="text" name="adress" id="adress" placeholder="adresse" value="{{ $user->adress }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <input type="text" name="code_postal" id="code_postal" placeholder="Enter code postal" value="{{ $user->code_postal }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <input type="text" name="ville" id="ville" placeholder="Enter ville" value="{{ $user->ville }}"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="mb-5 hover:shadow-form w-full rounded-md bg-[#FF91B2] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                        Mettre à jour
                    </button>

                    <a href="{{ route('admin.users.index') }}">
                        <button
                                    class="hover:shadow-form w-full rounded-md bg-black py-3 px-8 text-center text-base font-semibold text-white outline-none">
                                    Annuler
                                </button>
                    </a>
                </div>
            </form>
        </div>
    </div> --}}


@endsection
