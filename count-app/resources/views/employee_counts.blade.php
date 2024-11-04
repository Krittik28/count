@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee Counts</h1>
    <form method="GET" action="{{ route('employee.counts') }}">
        <div class="form-group">
            <label for="group_by">Group By:</label>
            <select name="group_by" id="group_by" class="form-control">
                <option value="">Select...</option>
                <option value="districts">Districts</option>
                <option value="designations">Designations</option>
                <option value="programs">Programs</option>
                <option value="blocks">Blocks</option>
                <option value="gram_panchayats">Gram Panchayats</option>
                <option value="levels">Levels</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="level_id">Select Level:</label>
            <select name="level_id" id="level_id" class="form-control">
                <option value="">Select Level...</option>
                @foreach($levels as $level)
                    <option value="{{ $level->level_id }}">{{ $level->level_name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="district_id">Select District:</label>
            <select name="district_id" id="district_id" class="form-control">
                <option value="">Select District...</option>
                @foreach($districts as $district)
                    <option value="{{ $district->district_code }}">{{ $district->district_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="program_id">Select Program:</label>
            <select name="program_id" id="program_id" class="form-control">
                <option value="">Select Program...</option>
                @foreach($programs as $program)
                    <option value="{{ $program->program_id }}">{{ $program->program_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="designation_id">Select Designation:</label>
            <select name="designation_id" id="designation_id" class="form-control">
                <option value="">Select Designation...</option>
                @foreach($designations as $designation)
                    <option value="{{ $designation->designation_id }}">{{ $designation->designation_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Get Counts</button>
    </form>

    <div id="results">
        @if(isset($results) && count($results) > 0)
            <h2>Results:</h2>
            <ul>
                @foreach($results as $result)
                    <li>{{ $result[$group_by] }}: {{ $result->employee_count }}</li>
            @endforeach
            </ul>
        @elseif(isset($results) && count($results) == 0)
            <h2>No results found.</h2>
        @endif
    </div>

</div>
@endsection
