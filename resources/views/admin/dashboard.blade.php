@extends('layouts.admin')

@section('content')
    <div class="px-3 md:px-16 flex">
        @include('inc.admin-sidebar')
        <livewire:admin.dashboard>
        {{-- <livewire:user-profile :user="$user" :key="$user->id"> --}}

    </div>
@endsection
