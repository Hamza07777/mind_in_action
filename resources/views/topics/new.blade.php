@extends("layouts.app")

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add Service</h5>
                    <div class="card-header-right">
                        <a href="/services" class="btn btn-light">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                    @include("common.error-message")

                    <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                                  <div class="form-group m-form__group">
                                    <label>Service Name</label>
                                    <div class="input-group">
                                      <input type="text" placeholder="Service Name" id="name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                  </div>
                                  <div class="form-group m-form__group">
                                    <label>Service Description</label>
                                    <div class="input-group">
                                      <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" placeholder="Service Description" name="description"></textarea>
                                    </div>
                                  </div>

                                  <div class="form-group m-form__group">
                                    <label>Service Price</label>
                                    <div class="input-group">
                                      <input type="text" placeholder="Service Price"  id="price"  class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>
                                    </div>
                                  </div>
                                  <div class="form-group m-form__group">
                                    <label>Service logo (.PNG,.JPG)</label>
                                    <div class="input-group">
                                      <input class=" form-control @error('image') is-invalid @enderror" type="file"  name="image" accept="image/jpeg, image/png" value="{{ old('image') }}" required >
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
            </div>
        </div>
        <script type="text/javascript">


        </script>
@endsection
