@extends('layouts.master')

@section('title')
  Greeting Form
@endsection

@section('content')
<h3>Results</h3>

<h4>User has entered {{$name}} {{$year}} {{$state}}</h4>

    @if (empty($name || $year || $state))
        <p>No Results</p>
        
    @else
    <table class="bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>From</th>
                <th>To</th>
                <th>Duration</th>
                <th>Party</th
                ><th>State</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pms as $pm)
              <tr>
                  <td>{{{ $pm['index'] }}}</td>
                  <td>{{{ $pm['name'] }}}</td>
                  <td>{{{ $pm['from'] }}}</td>
                  <td>{{{ $pm['to'] }}}</td>
                  <td>{{{ $pm['duration'] }}}</td>
                  <td>{{{ $pm['party'] }}}</td>
                  <td>{{{ $pm['state'] }}}</td>
              </tr>
            @endforeach
        </tbody>
    </table>
    
    @endif

  <h3>Query</h3>
  <form method="get" action="search">
  {{csrf_field()}}
  <table>
    <tr><td>Name: </td><td><input type="text" name="name"></td></tr>
    <tr><td>Year: </td><td><input type="text" name="year"></td></tr>
    <tr><td>State: </td><td><input type="text" name="state"></td></tr>
    <tr><td colspan=2><input type="submit" value="Search">
                      <input type="reset" value="Reset"></td></tr>
  </table>
  </form>
@endsection
