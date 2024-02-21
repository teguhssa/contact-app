{{--  extends the layouts.app layout template,  --}}
@extends('layouts.app')

{{-- defines a section where content will be inserted into the layout. --}}
@section('content')
    <div class="d-flex align-items-center justify-content-center pt-4">
        <h3 class="fw-bold text-center">Contacts</h3>
    </div>
    <div class="list-contact pt-4">
        {{-- show total contacts we have --}}
        <h5 class="text-start mb-3">My Contacts ({{ $totalContacts }})</h5>
        <ul class="p-0">

            {{-- loop through contacts to show all contact --}}
            @foreach ($contacts as $contact)
                <li class="mb-4 text-dark">
                    <a href="{{ route('contact.show', $contact->id) }}">
                        <div class="contact-info d-flex gap-4">
                            <span class="avatar-contact"><i class="fas fa-user"></i></span>
                            <div class="d-flex flex-column">
                                <p class="mb-0">{{ $contact->name }}</p>
                                <span style="opacity: 0.5">{{ $contact->phone_number }}</span>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
    <div class="btnAdd">
        <a href="/add"><i class="fas fa-plus text-light"></i></a>
    </div>
@endsection
