<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('images/' . $employee->image_path) }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Name : {{ $employee->name }}</h5>
                            <p class="card-text">{{ $employee->about }}
                        </div>
                    </div>

                    @if ($errors->any())
                        <h6 class="alert alert-danger"> Please insert you input </h6>
                    @endif

                    @if (session('success'))
                        <h6 class="alert alert-success"> {{ session('success') }} </h6>
                    @endif

                    <h6 class="mt-2">Current Role</h6>

                    @if ($employee->roles)
                        @foreach ($employee->roles as $employee_role)
                            <button class="btn btn-primary mt-3">{{ $employee_role->name }}</button>
                        @endforeach
                    @endif

                    <form class="mt-3" method="POST" action="{{ route('assign.role', $employee->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputRole">Role</label>
                            <select name="role" class="form-control col-md-4 " id="exampleFormControlSelect1">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary bg-primary">Assign</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
