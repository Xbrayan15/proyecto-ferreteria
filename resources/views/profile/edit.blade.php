@extends('layouts.app')

@section('content')
<div class="container py-5">
    <header class="mb-5">
        <h2 class="h4 text-primary">
            {{ __('Profile') }}
        </h2>
    </header>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Update Profile Information -->
            <div class="card shadow-lg border-0 mb-4">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="card shadow-lg border-0 mb-4">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User -->
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
