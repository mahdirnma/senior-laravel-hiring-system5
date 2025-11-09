@extends('layout.app2')
@section('title')
    add job
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-end items-center border-b">
                <h2 class="text-xl">add job</h2>
            </div>
            <div class="flex w-full h-4/5">
                <form action="{{route('jobs.store')}}" method="post" class="w-full h-full flex flex-row-reverse">
                    @csrf
                    <div class="w-1/2 h-full flex flex-col items-end pr-20 relative">
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="title" class="font-semibold ml-5">: title</label>
                            <input type="text" name="title" value="{{old('title')}}" id="title" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('title')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="description" class="font-semibold ml-5">: description</label>
                            <textarea name="description" id="description" cols="10" rows="10" class="w-2/5 h-32 rounded outline-0 p-2 border border-gray-400">{{old('description')}}</textarea>
                            @error('description')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="salary" class="font-semibold ml-5">: salary (million)</label>
                            <input type="number" name="salary" min="1" max="100" value="{{old('salary')}}" id="salary" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('salary')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="course_id" class="font-semibold ml-5">: company</label>
                            <select name="company_id" id="company_id" class="w-2/5 h-8 rounded outline-0 px-2 border border-gray-400">
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->title}}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <input type="submit" value="Add" class="absolute bottom-2 -left-10 text-white bg-gray-700 py-3 px-7 cursor-pointer rounded">
                    </div>
                    <div class="w-1/2 h-full flex flex-col items-end pr-20">
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="working_hours" class="font-semibold ml-5">: working hours</label>
                            <input type="number" name="working_hours" min="30" max="50" value="{{old('working_hours')}}" id="working_hours" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('working_hours')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="working_days" class="font-semibold ml-5">: working days</label>
                            <input type="number" name="working_days" min="1" max="7" value="{{old('working_days')}}" id="working_days" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('working_days')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="department" class="font-semibold ml-5">: department</label>
                            <select name="department" id="department" class="w-2/5 h-8 rounded outline-0 px-2 border border-gray-400">
                                <option value="administration">administration</option>
                                <option value="tech team">technical_team</option>
                                <option value="training">training</option>
                            </select>
                            @error('department')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="type" class="font-semibold ml-5">: type</label>
                            <select name="type" id="type" class="w-2/5 h-8 rounded outline-0 px-2 border border-gray-400">
                                <option value="remote">remote</option>
                                <option value="hybrid">hybrid</option>
                                <option value="in_person">in_person</option>
                            </select>
                            @error('type')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
