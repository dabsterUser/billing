@extends('layouts.customer')

@section('content')
<div class="container-fluid">
    <div class="homepage-cards mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5><i class="icon icon-list mr-2"></i> Membership Details</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover" data-footable="" id="product-datatable" data-toggle-column="last" style="display: table;">
                            <thead>
                                <tr class="footable-header">
                                    <th>MemberShip Type</th>
                                    <th>Started On</th>
                                    <th>Expires on</a></th>
                                    <th>Last Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-info">Free</button>
                                    </td>
                                    <td>
                                    {{ change_date_format($user->created_at,'d M ,Y H:i:s')}}
                                    </td>
                                    <td> -- </td>
                                    <td> -- </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection