@php use App\Models\Applicant;use App\Models\Job; @endphp
@extends('layout.app')
@section('title')
    applies
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-between items-center border-b">
                <h2 class="text-xl">applies</h2>
            </div>
            <div class="w-[90%] h-3/5 flex flex-col justify-center">
                <table class="w-full min-h-full border border-gray-400">
                    <thead>
                    <tr class="h-12 border border-gray-400 border-b-2 border-b-gray-400">
                        <td class="text-center">reject</td>
                        <td class="text-center">accept</td>
                        <td class="text-center">status</td>
                        <td class="text-center">requested salary</td>
                        <td class="text-center">location</td>
                        <td class="text-center">resume description</td>
                        <td class="text-center">hiring description</td>
                        <td class="text-center">current company</td>
                        <td class="text-center">current status</td>
                        <td class="text-center">job</td>
                        <td class="text-center">applicant name</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($applies as $apply)
                        <tr>
                            <td class="text-center">
                                <form action="{{route('manager.applies.reject',compact('apply'))}}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="text-red-700 cursor-pointer">reject</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{route('manager.applies.accept',compact('apply'))}}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="text-green-700 cursor-pointer">accept</button>
                                </form>
                            </td>
                            <td class="text-center">{{$apply->status}}</td>
                            <td class="text-center">{{$apply->requested_salary}}</td>
                            <td class="text-center">{{$apply->location}}</td>
                            <td class="text-center">{{$apply->resume_description}}</td>
                            <td class="text-center">{{$apply->hiring_description}}</td>
                            <td class="text-center">{{$apply->current_company}}</td>
                            <td class="text-center">{{$apply->current_status}}</td>
                            <td class="text-center">{{Job::find($apply->job_id)->title}}</td>
                            <td class="text-center">{{Applicant::find($apply->applicant_id)->name}}</td>
                            {{--<td class="text-center">{{$apply->applicants->name}}</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">{{$applies->links()}}</div>
        </div>
@endsection
