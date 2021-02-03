@extends('layouts.dashboard')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
        <h1>dati</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>{{ Auth::user()->name}}</th>
                </tr>
                <tr>
                    <th>Email</th>
                    <th>{{ Auth::user()->email}}</th>
                </tr>
                <tr>
                    <th>Token</th>
                    @if (Auth::user()->api_token)
                        <th>{{ Auth::user()->api_token}}</th>
                    @else
                    <th>
                        <form class="" action="{{route('admin.generate_token')}}" method="post">
                            @csrf
                            <button type="submit" name="button">Genera token</button>
                        </form>
                    </th>

                    @endif
                </tr>
            </thead>

        </table>

      </div>
  </div>
</div>
@endsection
