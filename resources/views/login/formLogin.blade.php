<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login Form</title>
</head>
<body>
    @if (session('loginGagal')) 
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('loginGagal') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="container">
        <div>
        <form action="{{ route('login.processLogin') }}" method="post" class="bg-white">
            @csrf
            <p class="text-center">Please Login </p>
            <div class="row my-2 mb-4">
                {{-- input email --}}
                <div class="col-1">
                    <label for="email" class="form-label me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                        </svg>
                    </label>
                </div>
                <div class="col-11">
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" @if (Cookie::has('email')) value="{{ Cookie::get('email') }}"  @else value="{{ old('email') }}" @endif autofocus>
                    @error('email')
                    <div class="invalid-feedback mb-0">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            {{-- input password --}}
            <div class="row my-2 mb-4">
            <div class="col-1">
                <label for="password" class="form-label me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                        <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
                    </svg>
                </label>
            </div>
            <div class="col-11">
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"  @if (Cookie::has('password')) value="{{ Cookie::get('password') }}"  @else value="{{ old('password') }}" @endif>
                @error('password')
                    <div class="invalid-feedback mb-0">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            </div>
            {{-- checkbox & submit--}}
            <div class="d-flex justify-content-between my-2">
                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1" @if (Cookie::get('remember') == 'on') 
                    checked  @else @endif >remember me</label>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
        {{-- register --}}
        <div class="d-flex bg-white p-2 text-center justify-content-between regis ">
            <a href="{{ route('forgot.forgot') }}" class="text-decoration-none">Forgot Password</a>
            <p>Doesn't have account? <a href="{{ route('register.formRegister') }}" class="text-decoration-none">Register </a></p>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>