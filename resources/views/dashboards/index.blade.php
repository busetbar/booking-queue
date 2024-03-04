@extends('layouts.base')

@section('main-content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Add Ticket</h3>
                <p class="text-subtitle text-muted">Multiple form layouts, you can use.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Layout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ticket Form</h4>
                    </div>
                    <div class="col-12">
                    @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="POST" action="{{route('PostTicket')}}" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Username</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="username" name="contact_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Email</label>
                                            <input type="email" id="last-name-column" class="form-control"
                                                placeholder="Email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">No Telphone</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="Password"
                                                name="no_tlp">
                                        </div>
                                    </div>  
                                    <div class="col-md-6 mb-12">
                                        <label>Status</label>
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="status">
                                                <option value="open">Open</option>
                                                <option value="closed" disabled>Closed</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button class="btn btn-danger me-1 mb-1" onclick="history.back()">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection