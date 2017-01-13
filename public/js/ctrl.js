app.controller('JournalCtrl',['$scope','$http',function($scope,$http){
	$scope.title = "Lists";
	$http.get(url+'/api/journals/lists').then(function(result){
		$scope.journals = result.data;
	});
	$http.get(url+'/api/accounts/parents').then(function(result){
		console.log(result);
		$scope.journals = result.data;
	});
	// var data = {
	// 		'select':'t_account_id',
	// 		'description':'t_description',
	// 		'debit':'t_debit_amount',
	// 		'credit':'t_credit_amount'
	// 	};
	$scope.input_items = [
		{
			'select':'t_1_account_id',
			'description':'t_1_description',
			'debit':'t[1][debit]',
			'credit':'t[1][credit]'
		},
		{
			'select':'t_2_account_id',
			'description':'t_2_description',
			'debit':'t[2][debit]',
			'credit':'t[2][credit]'
		}
	];

	$scope.add = function(){
		var length = $scope.input_items.length+1;
		$scope.input_items.push({
			'select':'t_'+length+'account_id',
			'description':'t_'+length+'description',
			'debit':'t['+length+'][debit]',
			'credit':'t['+length+'][credit]'
		});
	}
	 $scope.removeItem = function(index){
	    $scope.input_items.splice(index, 1);
	  }
	$scope.save = function(){
		return "hellow";
		
	}


}]);