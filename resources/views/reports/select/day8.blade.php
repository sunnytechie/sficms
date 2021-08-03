@switch($day8)
    @case("Sunday")
    <option selected>{{ $day8 }}</option>
    <option>Monday</option>
    <option>Tuesday</option>
    <option>Wednesday</option>
    <option>Thursday</option>
    <option>Friday</option>
    <option>Saturday</option>
        @break
    @case("Monday")
    <option>Sunday</option>
    <option selected>{{ $day8 }}</option>
    <option>Tuesday</option>
    <option>Wednesday</option>
    <option>Thursday</option>
    <option>Friday</option>
    <option>Saturday</option>
        @break
    @case("Tuesday")
        <option>Sunday</option>
        <option>Monday</option>
        <option selected>{{ $day8 }}</option>
        <option>Wednesday</option>
        <option>Thursday</option>
        <option>Friday</option>
        <option>Saturday</option>
            @break
    @case("Wednesday")
    <option>Sunday</option>
    <option>Monday</option>
    <option>Tuesday</option>
    <option selected>{{ $day8 }}</option>
    <option>Thursday</option>
    <option>Friday</option>
    <option>Saturday</option>
        @break
    @case("Thursday")
    <option>Sunday</option>
    <option>Monday</option>
    <option>Tuesday</option>
    <option>Wednesday</option>
    <option selected>{{ $day8 }}</option>
    <option>Friday</option>
    <option>Saturday</option>
        @break
        @case("Friday")
    <option>Sunday</option>
    <option>Monday</option>
    <option>Tuesday</option>
    <option>Wednesday</option>
    <option>Thursday</option>
    <option selected>{{ $day8 }}</option>
    <option>Saturday</option>
        @break
        @case("Saturday")
        <option>Sunday</option>
        <option>Monday</option>
        <option>Tuesday</option>
        <option>Wednesday</option>
        <option>Thursday</option>
        <option>Friday</option>
        <option selected>{{ $day8 }}</option>
            @break
    @default
    <option>Sunday</option>
    <option>Monday</option>
    <option>Tuesday</option>
    <option>Wednesday</option>
    <option>Thursday</option>
    <option>Friday</option>
    <option>Saturday</option>
@endswitch
