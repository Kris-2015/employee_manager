<?php

	class employee
	{
		var $x="hello world";

		function test()
		{
			echo $this->x;
		}

		function employee()
		{
			echo "hello";

		}
	}

	$ob = new employee();
	echo "<br>";
	$ob->test();
	//$ob->test();
?>