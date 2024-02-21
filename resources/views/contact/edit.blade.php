@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center gap-4 pt-4">
        <a href="/" class="text-dark">
            <i class="fas fa-chevron-left" style="font-size: 1.25rem"></i>
        </a>
        <h3 class="fw-bold text-center mb-0">Edit Contact</h3>
    </div>

    {{-- define form laravelcollective and route with param id --}}
    {!! Form::open(['method' => 'put', 'route' => ['contact.update', $contact->id]]) !!}
    <div class="d-flex flex-column align-items-center justify-content-center gap-2">
        <div class="my-4 img-info">
            <span><i class="fas fa-user text-light"></i></span>
        </div>
        <div class="input-form d-flex align-items-center">
            <i class="fas fa-user me-3"></i>
            {{-- showing data according to the id --}}
            <input type="text" name="name" id="name" placeholder="Name" value="{{ $contact->name }}">
        </div>
        {{-- show error if there a mistake when updating data --}}
        <i class="text-danger">{{ $errors->first('name') }}</i>
        <div class="input-form d-flex align-items-center">
            <i class="fas fa-envelope me-3"></i>
            {{-- showing data according to the id --}}
            <input type="email" name="email" id="email" placeholder="Email" value="{{ $contact->email }}">
        </div>
        {{-- show error if there a mistake when updating data --}}
        <i class="text-danger">{{ $errors->first('email') }}</i>
        <div class="input-form d-flex align-items-center">
            <i class="fas fa-phone-alt me-3"></i>
            {{-- showing data according to the id --}}
            <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Number" value="{{ $contact->phone_number  }}">
        </div>
        {{-- show error if there a mistake when updating data --}}
        <i class="text-danger">{{ $errors->first('phoneNumber') }}</i>
        <div class="input-form d-flex align-items-center">
            <i class="fas fa-map-marker-alt me-3"></i>
            {{-- showing data according to the id --}}
            <input type="text" name="address" id="address" placeholder="Address" value="{{ $contact->address }}" />
        </div>
        {{-- show error if there a mistake when updating data --}}
        <i class="text-danger">{{ $errors->first('address') }}</i>
        <div style="width: 80%">
            <button class="btnSave" name="save">Save</button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
