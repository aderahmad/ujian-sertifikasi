<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Form Register</title>
</head>
<body>
    @if (session('loginGagal')) 
            <p>login gagal</p>
        @endif
    <div class="container">
        <div>
        <form action="{{ route('register.processRegister') }}" method="post" class="bg-white">
            @csrf
            <p class="text-center">Register</p>
            {{-- input name --}}
            <div class="row my-2 mb-4">
                <div >
                    <label for="name" class="form-label me-2">Name
                    </label>
                </div>
                <div>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus>
                    @error('name')
                    <div class="invalid-feedback mb-0">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            {{-- input email --}}
            <div class="row my-2 mb-4">
                <div >
                    <label for="email" class="form-label me-2">Email
                    </label>
                </div>
                <div>
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback mb-0">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            {{-- input password --}}
            <div class="row my-2 mb-4">
            <div class="">
                <label for="password" class="form-label me-2">Password
                </label>
            </div>
            <div class="">
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                @error('password')
                    <div class="invalid-feedback mb-0">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            </div>
            {{-- checkbox & submit--}}
            <div class="d-flex justify-content-between my-2">
                {{-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">remember me</label>
                </div> --}}
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
        {{-- register --}}
        <div class="d-flex bg-white p-2 text-center justify-content-between regis ">
            {{-- <a href="" class="text-decoration-none">Forgot Password</a> --}}
            <p>Already have account?<a href="{{ route('login.formLogin') }}" class="text-decoration-none"> Login </a></p>
        </div>
        </div>
    </div>
</body>
</html>