@extends("layouts.app")

@section("content")

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Add Employee</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group m-form__group">
                        <label>Name</label>
                        <div class="input-group">
                          <input id="name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus type="text" placeholder=" Name">
                        </div>
                      </div>
                      <div class="form-group m-form__group">
                        <label>Email</label>
                        <div class="input-group">
                          <input id="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email" placeholder="someone@gmail.com">
                        </div>
                      </div>

                      <div class="form-group m-form__group">
                        <label>Phone Number</label>
                        <div class="input-group">
                            <input id="phone_number"  class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus type="text" placeholder="Phone Number">

                        </div>
                      </div>

                      <div class="form-group m-form__group">
                        <label>Address</label>
                        <div class="input-group">
                          <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Address" name="address"></textarea>
                        </div>
                      </div>


                      <div class="form-group m-form__group">
                        <label>Working Hours</label>
                        <div class="input-group">
                          <input id="working_hours"  class="form-control @error('working_hours') is-invalid @enderror" name="working_hours" value="{{ old('working_hours') }}" required autocomplete="working_hours" autofocus type="text" placeholder="Working hours">
                        </div>
                      </div>
                      <div class="form-group m-form__group">
                        <label>Start Time</label>
                        <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                          <input id="start_time"  class="form-control @error('start_time') is-invalid @enderror" name="start_time"  required  autofocus type="text" value="9:00"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                        </div>
                      </div>
                      <div class="form-group m-form__group">
                        <label>End Time</label>
                        <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                          <input id="end_time"  class="form-control @error('end_time') is-invalid @enderror" name="end_time"  required autofocus type="text" value="6:15"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                        </div>
                      </div>
                      <div class="form-group m-form__group">
                        <label>Gender</label>
                        <div class="input-group">
                          <select class="js-example-basic-single col-sm-12" name="gender">
                            <optgroup label="Select Gender" >
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </optgroup>
                          </select>
                        </div>
                      </div>
                      <div class="form-group m-form__group">
                        <label>Image (.PNG,.JPG)</label>
                        <div class="input-group">
                          <input class="form-control @error('image') is-invalid @enderror" type="file"  name="image" accept="image/jpeg, image/png" value="{{ old('image') }}" required >
                        </div>
                      </div>




              </div>
            </div>
          </div>

          <div class="card-footer">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-light" type="submit">Cancel</button>
          </div>
        </div>
      </div>
    </form>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          // Fetch all records

        fetchRecords(0);



        });


        function fetchRecords(id){
          $.ajax({
              url: '/company_deals/get_services/'+id,
            type: 'get',
            dataType: 'json',
            success: function(response){

              var len = 0;
              $('#chk_boxes_jquery').empty();
              if(response['data'] != null){
                 len = response['data'].length;
              }

              if(len > 0){
                 for(var i=0; i<len; i++){
                  var id = response['data'][i].id;
                  var name = response['data'][i].name;



                  var tr_str = "<div class='col-md-3 mt-2'>" +
                      "<label class='d-block' for='chk-ani'>" +"<input class='checkbox_animated' name='services[]' id='chk-ani' value="+name+" type='checkbox'>"+ name+ "</label>" +


                    "</div>";




                    $("#chk_boxes_jquery").append(tr_str);
                 }
              }

            }
          });
        }


  </script>
@endsection
