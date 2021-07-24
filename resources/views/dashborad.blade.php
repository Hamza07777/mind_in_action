@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
<div class="col-sm-12 box-col-12">
    <div class="row overall-report">


        <div class="col-xl-3 xl-50 col-md-6 box-col-6">
            <div class="card card-with-border">
              <div class="card-body">
                <div class="text-center">
                  <h2 class="counter f-w-600">{{ $user_count_employee }}</h2>
                  <p>Total Employee</p>
                  <div class="employees"><i class="fa fa-female"></i><i class="fa fa-male"></i><i class="fa fa-female"></i><i class="fa fa-male"></i><i class="fa fa-female"></i><i class="fa fa-male light-icon"></i><i class="fa fa-female light-icon"></i><i class="fa fa-male light-icon"></i><i class="fa fa-female light-icon"> </i></div>
                </div>
                <div class="employee-progress">
                  <div class="value-total">
                    <label> Male ({{ $male_perc_employee }})</label>
                    <div class="progress-showcase">
                      <div class="progress sm-progress-bar">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $male_perc_employee }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                  <div class="value-total">
                    <label>Female ({{ $female_perc_employee }})</label>
                    <div class="progress-showcase">
                      <div class="progress sm-progress-bar">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $female_perc_employee }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                  <div class="value-total">
                    <label>Total Staff({{  $user_count_employee  }})</label>
                    <div class="progress-showcase">
                      <div class="progress sm-progress-bar">
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $user_count_employee }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

      <div class="col-xl-3 xl-50 col-md-6 box-col-6">
        <div class="card card-with-border">
          <div class="card-body">
            <div class="text-center">
              <h2 class="counter f-w-600">{{  $user_count  }}</h2>
              <p>Total Students</p>
              <div class="employees"><i class="fa fa-female"></i><i class="fa fa-male"></i><i class="fa fa-female"></i><i class="fa fa-male"></i><i class="fa fa-female"></i><i class="fa fa-male light-icon"></i><i class="fa fa-female light-icon"></i><i class="fa fa-male light-icon"></i><i class="fa fa-female light-icon"> </i></div>
            </div>
            <div class="employee-progress">
              <div class="value-total">
                <label> Male({{ $male }})</label>
                <div class="progress-showcase">
                  <div class="progress sm-progress-bar">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $male }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
              <div class="value-total">
                <label>Female ({{ $female }})</label>
                <div class="progress-showcase">
                  <div class="progress sm-progress-bar">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $female }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
              <div class="value-total">
                <label>Total Staff({{  $user_count  }})</label>
                <div class="progress-showcase">
                  <div class="progress sm-progress-bar">
                    <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ $user_count }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
@endsection
