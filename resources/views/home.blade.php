@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form enctype="multipart/form-data" method="post" action="{{url('test-save')}}">
                        {{csrf_field()}}
                        <input type="file" name="image" />
                        <input type="hidden" name="user_id" value="{{auth()->id()}}">

                        <button type="submit">Save</button>
                    </form>
                    <img src="{{asset('images/' . auth()->user()->image_md5_sum)}}.png" alt="{{auth()->user()->image_name}}"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
