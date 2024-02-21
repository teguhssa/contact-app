@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center gap-4 pt-4">
        <a href="/" class="text-dark">
            <i class="fas fa-chevron-left" style="font-size: 1.25rem"></i>
        </a>
        <h3 class="fw-bold text-center mb-0">Contact Info</h3>
    </div>

     <div class="d-flex flex-column align-items-center justify-content-center gap-2">
        <div class="my-4 img-info">
            <span><i class="fas fa-user text-light"></i></span>
        </div>
        <h5 class="mb-0">{{ $contact->name }}</h5>
    </div>

    <div class="my-3">
        <div class="row">
            <div class="col-6">
                {{-- route to edit page based on id --}}
                <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-warning text-light w-100">Edit</a>
            </div>
            <div class="col-6">
                {{-- route to delete data based on id --}}
                <a href="{{ route('contact.destroy', $contact->id) }}" class="btn btn-danger text-light w-100">Delete</a>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-center my-4 p-4 bg-dark rounded" >
        <i class="fas fa-envelope me-3 text-light text-light"></i>
        {{-- showing contact info --}}
        <p class="mb-0 text-light">{{ $contact->email }}</p>
    </div>
    <div class="d-flex align-items-center justify-content-center my-4 p-4 bg-dark rounded" >
        <i class="fas fa-phone-alt me-3 text-light"></i>
        {{-- showing contact info --}}
        <p class="mb-0 text-light">{{ $contact->phone_number }}</p>
    </div>
    <div class="d-flex align-items-center justify-content-center my-4 p-4 bg-dark rounded" >
        <i class="fas fa-map-marker-alt me-3 text-light"></i>
        {{-- showing contact info --}}
        <p class="mb-0 text-light">{{ $contact->address }}</p>
    </div>

@endsection