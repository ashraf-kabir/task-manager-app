@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if (session()->has('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
      @endif
      @if(session()->has('error'))
        <div class="alert alert-danger">
          {{ session()->get('error') }}
        </div>
      @endif

      <div class="card">
        <div class="card-header">Company Profile</div>

        <div class="card-body">
          <form action="{{ route('company.update-company') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="name" id="name"
                         value="{{ old('name', $company->name ?? NULL) }}">
                  @error('name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone">Phone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="phone" id="phone"
                         value="{{ old('phone', $company->phone ?? NULL) }}">
                  @error('phone')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="address">Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="address" id="address"
                         value="{{ old('address', $company->address ?? NULL) }}">
                  @error('address')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="city">City <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="city" id="city"
                         value="{{ old('city', $company->city ?? NULL) }}">
                  @error('city')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="state">State <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="state" id="state"
                         value="{{ old('state', $company->state ?? NULL) }}">
                  @error('state')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="zip">Zip <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="zip" id="zip"
                         value="{{ old('zip', $company->zip ?? NULL) }}">
                  @error('zip')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="country">Country <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="country" id="country"
                         value="{{ old('country', $company->country ?? NULL) }}">
                  @error('country')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
