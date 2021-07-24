@extends("layouts.app")

@section("content")

<div class="row">
    {{-- @foreach ($user as $user) --}}


    <div class="col-xl-4 xl-50 box-col-6">
        <div class="card card-with-border customer-satisfied">
          <div class="card-header card-no-border resolve-complain">
            <h5>Student Performance</h5>
            <p>Lorem Ipsum is simply dummy text of the Loren dummy text of the Loren dummy printing......</p>
            <div class="customers-details d-flex">
              <div class="complain-details pl-0 d-inline-block">
                <h4>{{ $average }}%<span class="font-primary"></h4><span class="d-block">performance  score</span>
              </div>
              <div class="legend-radial d-inline-block">
                <ul>
                  <li> 
                    <div class="value-square-box-success"></div><span class="f-w-600">Excellent score</span>
                  </li>
                  <li> 
                    <div class="value-square-box-secondary"></div><span class="f-w-600">Good score</span>
                  </li>
                  <li> 
                    <div class="value-square-box-warning"></div><span class="f-w-600">Fair score</span>
                  </li>
                  <li> 
                    <div class="value-square-box-warning"></div><span class="f-w-600">Poor score</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="satisfaction-table table-responsive">
              <table class="table table-bordernone">
                <tbody>

                 @foreach ($perfo as $perfo)
                  <tr>
                      <?php 
                      
                      $performance_percent=intval(($perfo->quiz_marks/$perfo->total_marks)*100);

                      ?>
                     
                    <td>
                      <p class="f-w-600">{{ $perfo->subject_name }}</p>
                    </td>
                    <td><span> {{ $performance_percent }}%</span></td>
                    <td>
                      <div class="number-radial">
                        <div class="radial-bar
                        
                       <?php
                        if($performance_percent>=75){
                            
                            ?>
                          
                            radial-bar-90 radial-bar-success
                            <?php  }
                           
                      
                  elseif ($performance_percent>=50 & $performance_percent<=74)
                  {
                      
                       ?>
                    radial-bar-75
                    radial-bar-secondary
                    <?php  }
                        
                   elseif ($performance_percent>=25 & $performance_percent<=49)
                   {?>
                    radial-bar-60
                    radial-bar-warning 
                    <?php    }
                         
                  else
                  {?>
                    radial-bar-20
                    radial-bar-danger
                    <?php    }
                  
                  
                       
                       ?>
                        
                         
                         " data-label="100%"></div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    {{-- @endforeach --}}

  </div>
        <script type="text/javascript">

            function deleteConfirm(id){

                swal({
                    title: "Are you sure?",
                    text: "This will delete the Category permanently",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        window.location = "/categories/delete/"+id;
                    }
                });

            }

            function clearSearch() {

            }

        </script>
@endsection
