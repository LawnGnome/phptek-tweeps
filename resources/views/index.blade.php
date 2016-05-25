@extends("layouts.master")

@section("title", "Tweeps")

@section("content")
    {!! $tweeps->links() !!}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Account</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tweeps as $tweep)
                <tr>
                    <td>{!! $tweep->account !!}</td>
                    <td>{!! $tweep->name !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $tweeps->links() !!}
@endsection
