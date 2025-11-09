@extends('layout.app2')
@section('title')
    apply for this job
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-end items-center border-b">
                <h2 class="text-xl">apply for this job</h2>
            </div>
            <div class="flex w-full h-4/5">
                <form action="{{route('job.apply',compact('job'))}}" method="post" class="w-full h-full flex flex-row-reverse">
                    @csrf
                    <div class="w-1/2 h-full flex flex-col items-end pr-20 relative">
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="current_status" class="font-semibold ml-5">: current status</label>
                            <input type="text" name="current_status" value="{{old('current_status')}}" id="current_status" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('current_status')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="current_company" class="font-semibold ml-5">: current company</label>
                            <input type="text" name="current_company" value="{{old('current_company')}}" id="current_company" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('current_company')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="hiring_description" class="font-semibold ml-5">:hiring description</label>
                            <textarea name="hiring_description" id="hiring_description" cols="10" rows="10" class="w-2/5 h-32 rounded outline-0 p-2 border border-gray-400">{{old('hiring_description')}}</textarea>
                            @error('hiring_description')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <input type="submit" value="APPLY" class="absolute bottom-2 -left-10 text-white bg-gray-700 py-3 px-7 cursor-pointer rounded">
                    </div>
                    <div class="w-1/2 h-full flex flex-col items-end pr-20">
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="requested_salary" class="font-semibold ml-5">: requested salary(million)</label>
                            <input type="number" min="10" max="100" name="requested_salary" value="{{old('requested_salary')}}" id="requested_salary" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('requested_salary')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="location" class="font-semibold ml-5">: location</label>
                            <input type="text" name="location" value="{{old('location')}}" id="location" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('location')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="resume_description" class="font-semibold ml-5">:resume description</label>
                            <textarea name="resume_description" id="resume_description" cols="10" rows="10" class="w-2/5 h-32 rounded outline-0 p-2 border border-gray-400">{{old('resume_description')}}</textarea>
                            @error('resume_description')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
