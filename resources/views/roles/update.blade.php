<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Department') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($errors->any())
                        <h6 class="alert alert-danger"> Please insert you input </h6>
                    @endif

                    @if (session('success'))
                        <h6 class="alert alert-success"> {{ session('success') }} </h6>
                    @endif


                    <form class="col-md-4" method="POST" action="{{ route('roles.update', $roles->id) }}"
                        enctype="
                        multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- <div class="mb-3">
                            <label for="formFile" class="form-label">Image</label>
                            <input class="form-control" type="file" id="formFile">
                            <div>Only jpg,png,bmp accepted.</div>
                        </div> --}}


                        <div class="form-group ">
                            <label for="exampleInputName">Roles</label>
                            <input type="text" name="name" class="form-control" value="{{ $roles->name }}">

                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputEmail">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputPassword1"
                                placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputRole">Role</label>
                            <select name="roles_id" class="form-control" id="exampleFormControlSelect1">
                                <option value="1">Marketer</option>
                                <option value="2">Developer</option>
                                <option value="3">Accountant</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputDepartment">Department</label>
                            <select name="department_id" class="form-control" id="exampleFormControlSelect1">
                                <option value="1">Marketing</option>
                                <option value="2">Development</option>
                                <option value="3">Accounting & Finance</option>
                            </select>
                        </div> --}}
                        <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
