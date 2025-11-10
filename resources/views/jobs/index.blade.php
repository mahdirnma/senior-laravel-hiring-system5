@extends('layout.app')
@section('title')
    jobs
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex flex-col items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <form action="{{route('jobs.index')}}" method="get" class="w-full h-16 px-5 flex flex-row-reverse items-center">
                <label for="department" class="font-semibold ml-2">: department</label>
                <select name="department" id="department" class="w-1/6 h-8 rounded outline-0 px-2 border border-gray-400">
                    <option value=""></option>
                    <option value="administration_department">administration</option>
                    <option value="technical_team">technical_team</option>
                    <option value="training_department">training</option>
                </select>
                <label for="company" class="font-semibold ml-2 mr-7">: company</label>
                <select name="company" id="company" class="w-1/6 h-8 rounded outline-0 px-2 border border-gray-400">
                    <option value=""></option>
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->title}}</option>
                    @endforeach
                </select>
                <label for="type" class="font-semibold ml-2 mr-7">: type</label>
                <select name="type" id="type" class="w-1/6 h-8 rounded outline-0 px-2 border border-gray-400">
                    <option value=""></option>
                    <option value="remote">remote</option>
                    <option value="hybrid">hybrid</option>
                    <option value="in_person">in_person</option>
                </select>
                <input type="submit" value="SEARCH" class="text-white bg-gray-700 py-1 px-4 cursor-pointer rounded mr-7">
            </form>
            <div class="w-[90%] h-1/5 flex justify-between items-center border-b">
                @auth('managers')
                <a href="{{route('jobs.create')}}" class="px-10 py-3 rounded-xl font-light text-white bg-gray-800">add job +</a>
                @endauth
                <h2 class="text-xl">jobs</h2>
            </div>
            <div class="w-[90%] h-3/5 flex flex-col justify-center">
                <table class="w-full min-h-full border border-gray-400">
                    <thead>
                    <tr class="h-12 border border-gray-400 border-b-2 border-b-gray-400">
{{--
                        @auth('managers')
                            <td class="text-center">delete job</td>
                            <td class="text-center">update job</td>
                        @endauth
--}}
                        @auth('applicants')
                            <td class="text-center">apply</td>
                        @endauth
                        <td class="text-center">company</td>
                        <td class="text-center">department</td>
                        <td class="text-center">type</td>
                        <td class="text-center">working days</td>
                        <td class="text-center">working hours</td>
                        <td class="text-center">salary</td>
                        <td class="text-center">description</td>
                        <td class="text-center">title</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            @auth('applicants')
                            <td class="text-center">
                                <form action="{{route('job.apply.form',compact('job'))}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-green-700 cursor-pointer">apply</button>
                                </form>
                            </td>
                            @endauth
                            <td class="text-center">{{$job->company->title}}</td>
                            <td class="text-center">{{$job->department}}</td>
                            <td class="text-center">{{$job->type}}</td>
                            <td class="text-center">{{$job->working_days}}</td>
                            <td class="text-center">{{$job->working_hours}}</td>
                            <td class="text-center">{{$job->salary}}</td>
                            <td class="text-center">{{$job->description}}</td>
                            <td class="text-center">{{$job->title}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">{{$jobs->links()}}</div>
        </div>
@endsection
