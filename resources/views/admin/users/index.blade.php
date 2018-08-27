@extends('layouts.admin') 
@section('content-wrapper')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Users</h4>
                <p class="card-description">
                    Add class
                    <code>.table-striped</code>
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    User
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Role
                                </th>
                                <th>
                                    Created
                                </th>
                                <th>
                                    Updated
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    #1
                                </td>
                                <td class="py-1">
                                    <img src="../../images/faces-clipart/pic-1.png" alt="image" />
                                </td>
                                <td>
                                    Herman Beck
                                </td>
                                <td>
                                    lcc@gmail.com
                                </td>
                                <td>
                                    administrator
                                </td>
                                <td>
                                    May 15, 2015
                                </td>
                                <td>
                                    May 15, 2015
                                </td>
                            </tr>
                            @if (count($users) > 0) @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->photo_id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role_id}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>
                            </tr>
                            @endforeach @else
                            <p>No data</p>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection