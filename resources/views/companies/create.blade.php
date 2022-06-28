@extends('layouts.layouts')

@section('content')
    <section class="bs-validation">
        <div class="row">
            <!-- Bootstrap Validation -->
            <div class="col-md-9 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Company</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate>
                            <div class="mb-1">
                                <label class="form-label" for="basic-addon-name">Name</label>
                                <input
                                    type="text"
                                    id="basic-addon-name"
                                    class="form-control"
                                    placeholder="Name"
                                    aria-label="Name"
                                    aria-describedby="basic-addon-name"
                                    required
                                />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter your name.</div>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="basic-default-email1">Email</label>
                                <input
                                    type="email"
                                    id="basic-default-email1"
                                    class="form-control"
                                    placeholder="john.doe@email.com"
                                    aria-label="john.doe@email.com"
                                    required
                                />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter a valid email</div>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="basic-default-password1">Password</label>
                                <input
                                    type="password"
                                    id="basic-default-password1"
                                    class="form-control"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    required
                                />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter your password.</div>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="bsDob">DOB</label>
                                <input type="text" class="form-control picker" name="dob" id="bsDob" required />
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please enter your date of birth.</div>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="select-country1">Country</label>
                                <select class="form-select" id="select-country1" required>
                                    <option value="">Select Country</option>
                                    <option value="usa">USA</option>
                                    <option value="uk">UK</option>
                                    <option value="france">France</option>
                                    <option value="australia">Australia</option>
                                    <option value="spain">Spain</option>
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please select your country</div>
                            </div>
                            <div class="mb-1">
                                <label for="customFile1" class="form-label">Profile pic</label>
                                <input class="form-control" type="file" id="customFile1" required />
                            </div>


                            <div class="mb-1">
                                <label class="form-label" for="select-country1">Country</label>
                                <select class="form-select" id="select-country1" required>
                                    <option value="">Select Country</option>
                                    <option value="usa">USA</option>
                                    <option value="uk">UK</option>
                                    <option value="france">France</option>
                                    <option value="australia">Australia</option>
                                    <option value="spain">Spain</option>
                                </select>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please select your country</div>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

