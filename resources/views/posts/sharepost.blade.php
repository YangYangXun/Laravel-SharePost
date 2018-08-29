@extends('layouts.sharepost-home') 
@section('content-wrapper')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Text colors</h4>
                <p class="card-description">
                    Use class
                    <code>.text-primary</code>,
                    <code>.text-secondary</code> etc. for text in theme colors
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-primary">.text-primary</p>
                        <p class="text-success">.text-success</p>
                        <p class="text-danger">.text-danger</p>
                        <p class="text-warning">.text-warning</p>
                        <p class="text-info">.text-info</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-light bg-dark pl-1">.text-light</p>
                        <p class="text-secondary">.text-secondary</p>
                        <p class="text-dark">.text-dark</p>
                        <p class="text-muted">.text-muted</p>
                        <p class="text-white bg-dark pl-1">.text-white</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection