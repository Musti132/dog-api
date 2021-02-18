@extends('layout.app')

@section('content')
<div class="container">
    <table class="table table-dark striped" id="dogTable">
        <thead>
            <tr>
                <th scope="col">Breed</th>
                <th scope="col">Sub Breed</th>
            </tr>
        </thead>
        <tbody>
            @foreach($breeds as $breed)
                <tr>
                    <th>{{ $breed->name }}</th>
                    <th>
                        @if(count($breed->sub))
                            @foreach($breed->sub as $sub)
                                <li>{{$sub->name}}</li>
                            @endforeach
                        @endif
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#dogTable').DataTable();
        })
    </script>
@endsection