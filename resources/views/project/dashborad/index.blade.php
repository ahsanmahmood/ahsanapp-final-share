@extends('project.index')
@if(Session::has('wronguser'))
<div class="alert alert-warning">
    Session::get('wronguser')
</div>
@endif
@section('content')
<!-- Users -->
<div>
    <div class="row">
        <div class="col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-people"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><h2>{{ Auth::user()->roles[0]->id == 1 ? 'All Users' : 'Users' }}</h2></span>
                    <span class="info-box-number"></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
    </div>
    <div class="row">
        @if(Auth::user()->roles[0]->id == 1)
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Total Users</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="col-md-12 chart">
                        <div id="signup-container">{{ $total_users }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Admins</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="col-md-12 chart">
                        <div id="signup-container">{{ $admins }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Rider</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="col-md-12 chart">
                        <div id="signup-container">{{ $riders }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">customer</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="col-md-12 chart">
                        <div id="signup-container">{{ $customers }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">service_provider</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="col-md-12 chart">
                        <div id="signup-container">{{ $service_providers }}</div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Total Users</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="col-md-12 chart">
                        <div id="signup-container">{{ $total_users }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Admins</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="col-md-12 chart">
                        <div id="signup-container">{{ $admins }}</div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<!-- Products -->
<div>
    <div class="row">
        <div class="col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="ion ion-ios-cart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><h2>{{ Auth::user()->roles[0]->id == 1 ? 'All Products' : 'Products' }}</h2></span>
                    <span class="info-box-number"></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Total Products</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="col-md-12 chart">
                        <div id="signup-container">{{ $total_products }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Featured Products</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="col-md-12 chart">
                        <div id="signup-container">{{ $feature_products }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Products on Sale</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="col-md-12 chart">
                        <div id="signup-container">{{ $sale_products }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<!-- Products Categories -->
<div>
    <div class="row">
        <div class="col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-ios-cart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><h2>{{ Auth::user()->roles[0]->id == 1 ? 'All Products Categories' : 'Products Categories' }}</h2></span>
                    <span class="info-box-number"></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Total Products Categories</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="col-md-12 chart">
                        <div id="signup-container">{{ $total_p_c }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
    <script>
    </script>
@endsection