
		<table class="table table-bordered">
			<thead>
				<tr>
					<th> User </th>
					<th>Login At</th>
					<th>Logout At</th>
					<th> Duration </th>
				</tr>
			</thead>
			<tbody>
				

					@foreach ($tracklogins as $tracklogin)
						
				        <tr  class="success" id="{{ $tracklogin->id }}">
				        	<td class="text-center">{{ $tracklogin->name }}</td>
				            <td class="text-center">{{ $tracklogin->login_at }}</td>
				            <td class="text-center">{{ $tracklogin->logout_at }}</td>
				            <td class="text-center"><?php
				            	$date1 = new DateTime($tracklogin->logout_at);
                                $date2 = new DateTime($tracklogin->login_at);

                                // The diff-methods returns a new DateInterval-object...
                                $diff = $date2->diff($date1);

                                // Call the format method on the DateInterval-object
                                echo $diff->format('%h hours %m mintues');
                               // var_dump($diff);

				            ?></td>
				        </tr>
				        
		     		@endforeach
	
			</tbody>
		</table>	
		