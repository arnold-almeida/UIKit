## [UIKit](/) \ Tables


These docs are a WIP.


### A standard table

```
	// Render a table
	{{ UIKit::table($rows) }}

```

```
	<!--OUTPUT -->

	<div class="">
		<table class="table table-striped">
			<thead>
				<tr class="">
					<th class="th-- th1">#</th>
					<th class="th-name th2">Name</th>
					<th class="th-email th3">Email</th>
					<th class="th-created th4">Created</th>
				</tr>
			</thead>
			<tbody>
				<tr class="even">
					<td class="">1</td>
					<td class="">John Doe</td>
					<td class="">john@anon.com</td>
					<td class="">2 days ago</td>
				</tr>
				<tr class="odd">
					<td class="">2</td>
					<td class="">Jane Doe</td>
					<td class="">jane@anon.com</td>
					<td class="">2 days ago</td>
				</tr>
			</tbody>
		</table>
	</div>

```

### A table with actions

```

	$data = array();
	foreach($rows as $user) {

		// Actions shiz
		$actions = array(
    	    'View' => array('admin.orders.view', array('id' => $user['id'])),
	        'Edit' => array('admin.orders.edit', array('id' => $user['id'])),
	    );

	    $actions = UIKit::actions($actions);

    	$created = Carbon::instance(new DateTime($user['created']));

	    $data[] = array(
    	    '#' => $user['id'],
	       	 'Name' => $user['name'],
    	   	 'Email' => $user['email'],
	       	 'Created' => $created->diffForHumans(),
	       	 'Actions' => $actions
	    );
	}

	// Render a table
	{{ UIKit::table($data) }}


```

```
	<!--OUTPUT -->

	<div class="">
		<table class="table table-striped">
			<thead>
				<tr class="">
					<th class="th-- th1">#</th>
					<th class="th-name th2">Name</th>
					<th class="th-email th3">Email</th>
					<th class="th-created th4">Created</th>
					<th class="th-actions th5">Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr class="even">
					<td class="">1</td>
					<td class="">John Doe</td>
					<td class="">john@anon.com</td>
					<td class="">2 days ago</td>
					<td class="">
						<a href="http://localhost:8000/admin/orders/view/1">View</a>
						<a href="http://localhost:8000/admin/orders/edit/2">Edit</a>
					</td>
					</tr>
				<tr class="odd">
					<td class="">2</td>
					<td class="">Jane Doe</td>
					<td class="">jane@anon.com</td>
					<td class="">2 days ago</td>
					<td class="">
						<a href="http://localhost:8000/admin/orders/view/1">View</a>
						<a href="http://localhost:8000/admin/orders/edit/2">Edit</a></td>
				</tr>
			</tbody>
		</table>
	</div>

```

### A table with actions, using a button group variant

As above but use a button group.

```
	//$actions = UIKit::actions($actions);
	$actions = UIKit::buttonGroup($actions, 'splitButtonDropdown')

```

```
	<!--OUTPUT -->
	<!-- This is where it starts getting fun -->
	<!-- Look at all the crap i dont have to write! -->

	<div class="">
		<table class="table table-striped">
			<thead>
				<tr class="">
					<th class="th-- th1">#</th>
					<th class="th-name th2">Name</th>
					<th class="th-email th3">Email</th>
					<th class="th-created th4">Created</th>
					<th class="th-actions th5">Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr class="even">
					<td class="">1</td>
					<td class="">John Doe</td>
					<td class="">john@anon.com</td>
					<td class="">2 days ago</td>
					<td class=""><div class="btn-group"><button type="button" class="btn btn-default"><a href="http://localhost:8000/admin/orders/view/1">View</a></button><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button><ul class="dropdown-menu" role="menu"><li><a href="http://localhost:8000/admin/orders/edit/2" title="Edit">Edit</a></li></ul></div></td>
				</tr>
				<tr class="odd">
					<td class="">2</td>
					<td class="">Jane Doe</td>
					<td class="">jane@anon.com</td>
					<td class="">2 days ago</td>
					<td class=""><div class="btn-group"><button type="button" class="btn btn-default"><a href="http://localhost:8000/admin/orders/view/1">View</a></button><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button><ul class="dropdown-menu" role="menu"><li><a href="http://localhost:8000/admin/orders/edit/2" title="Edit">Edit</a></li></ul></div></td>
				</tr>
			</tbody>
		</table>
	</div>

```

### A table with actions, using a button group for actions with pagination

```
	// Top pagination
	{{ UIKit::pagination($collection, $options) }}

	// Table
	{{ UIKit::table($data, $options) }}

	// Bottom pagination
	{{ UIKit::pagination($collection, $options) }}

```



##### Sample data

```
// From ORM, database etc.
// Use a presenter to do nice date formats etc

use Carbon\Carbon;

$rows = array(
 array(
  'id' => 1,
  'name' => 'John Doe',
  'email' => 'john@anon.com',
  'created' => '2014-02-25 13:26:03'
 ),
 array(
  'id' => 2,
  'name' => 'Jane Doe',
  'email' => 'jane@anon.com',
  'created' => '2014-02-25 13:26:03'
 ),
);

$data = array();
foreach($rows as $user) {

    $created = Carbon::instance(new DateTime($user['created']));

    $data[] = array(
        '#' => $user['id'],
        'Name' => $user['name'],
        'Email' => $user['email'],
        'Created' => $created->diffForHumans()
    );
}

```
