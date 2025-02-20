@extends('layouts.app')


@section('head')
    <style>

    </style>
@endsection

@section('content')
    <main class="p-2">
        <h4>Users</h4>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="py-3">
            <div class="p-3 d-flex bg-white rounded-3">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-user-tab" data-bs-toggle="pill" data-bs-target="#pills-user"
                            type="button" role="tab" aria-controls="pills-user" aria-selected="true">Users</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-circle-tab" data-bs-toggle="pill" data-bs-target="#pills-circle"
                            type="button" role="tab" aria-controls="pills-circle"
                            aria-selected="false">Circles</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-role-tab" data-bs-toggle="pill" data-bs-target="#pills-role"
                            type="button" role="tab" aria-controls="pills-role" aria-selected="false">Roles</button>
                    </li>
                </ul>
            </div>
            <div class="py-3 bg-white rounded-3 mt-3">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab"
                        tabindex="0">
                        @include('dashboard.users.content.usertab')
                    </div>
                    <div class="tab-pane fade" id="pills-circle" role="tabpanel" aria-labelledby="pills-circle-tab"
                        tabindex="0"> @include('dashboard.users.content.circletab') </div>
                    <div class="tab-pane fade" id="pills-role" role="tabpanel" aria-labelledby="pills-role-tab"
                        tabindex="0"> @include('dashboard.users.content.roletab') </div>
                </div>
            </div>
        </div>

        @include('dashboard.users.partials.adduser')
        @include('dashboard.users.partials.addrole')
        @include('dashboard.users.partials.addcircle')

    </main>
@endsection


@section('script')
    <script type="module">
        $(document).ready(function() {
            $('#cbCheckAllUser').change(function() {
                $('input[name="cb-row-user"]').prop('checked', this.checked);
            });

            $('#cbCheckAllCircle').change(function() {
                $('input[name="cb-row-circle"]').prop('checked', this.checked);
            });

            $('#cbCheckAllRole').change(function() {
                $('input[name="cb-row-role"]').prop('checked', this.checked);
            });
        });
    </script>
@endsection
