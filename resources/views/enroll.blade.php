<h5 class="card-title">Enrolled courses by {{$username}}</h5>
<table class="table">
<tbody>
<tr>
  <th></th>
</tr>
@forelse($subscriptions as $subscription)
<tr>
	<td>{{$subscription->course->name}}</td>
</tr>
@empty
<tr>
	<td>Not Enrolled in any of courses!</td>
</tr>
@endforelse
</tbody>
</table>
