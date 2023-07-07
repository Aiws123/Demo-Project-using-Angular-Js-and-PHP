<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign-Up Page</title>

	<link rel="stylesheet" href="assets/style.css">
	<script src="app-js/angular_modules/angular.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="app-js/crud-app.js"></script>
</head>

<body>

	<div ng-app="myApp" class="container" style="width:600px">
		<div style="text-align:center;color:#000">
			<h3><b>User Registraion Form</b></h3>
		</div>
		<div ng-controller="ContactController">

			<div class="alert {{alertClass}} alert-dismissible" ng-show="alertMsg">
				<a href="#" class="close" ng-click="closeMsg()" aria-label="close">&times;</a>
				{{alertMsg}}
			</div>

			<div align="left">
				<a href="login.php">Login</a>
			</div>

			<div align="right">
				<a href="#" ng-click="searchUser()">{{title}}</a>
			</div>
			<form role="form" class="well" name="frmContent" id="frmContent" novalidate ng-submit="frmContent.$valid && submit()" ng-hide="ifSearchUser">
				<div class="form-group">
					<label for="name"> Name: </label>
					<input type="text" id="name" name="name" class="form-control" placeholder="Enter Name " ng-model="newcontact.name" required>
					<span ng-show="frmContent.name.$error.required" class="text-danger">Required!</span>
				</div>
				<div class="form-group">
					<label for="email"> Email: </label>
					<input type="email" id="email" name="email" class="form-control" placeholder="Enter Email " ng-model="newcontact.email" required>
					<span ng-show="frmContent.email.$error.required" class="text-danger">Required!</span>
				</div>
				<div class="form-group">
					<label for="password"> Password: </label>
					<input type="password" id="password" name="password" class="form-control" placeholder="Enter Password " ng-model="newcontact.password" required>
					<span ng-show="frmContent.password.$error.required" class="text-danger">Required!</span>
				</div>
				<div class="form-group">
					<label for="phone"> Phone: </label>
					<input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Phone " ng-model="newcontact.phone" required>
					<span ng-show="frmContent.phone.$error.required" class="text-danger">Required!</span>
				</div>
				<br>
				<input type="hidden" ng-model="newcontact.id">
				<input ng-if="btnName == 'Save'" type="submit" class="btn btn-primary" ng-click="saveContact()" class="btn btn-primary" value="{{btnName}}" name="submit">
				<input ng-if="btnName == 'Update'" type="submit" class="btn btn-primary" ng-click="edit()" class="btn btn-primary" value="{{btnName}}" name="submit">

			</form>

			<div>
				<h4><b>Registered Users</b></h4>
				<table ng-if="contacts.length" class="table table-striped table-bordered table-hover">
					<thead>
						<tr class="info">
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

						<tr ng-repeat="contact in users">
							<td>{{ contact.name }}</td>
							<td>{{ contact.email }}</td>
							<td>{{ contact.phone }}</td>

							<td>
								<a href="#" ng-click="fetchData(contact.id)" role="button" class="btn btn-info">edit</a> &nbsp;
								<a href="#" ng-click="delete(contact.id)" role="button" class="btn btn-danger">delete</a>
							</td>
						</tr>
					</tbody>
				</table>
				<div ng-hide="contacts.length > 0">No Users Found</div>
			</div>
		</div>
	</div>


</body>

</html>