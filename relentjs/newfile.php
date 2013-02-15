<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
	<head>
		<title>relentjs</title>
	</head>
<body>
<?php
	$mysqli = new mysqli();
	$sql = "SELECT * FROM relentdb";
	$result = $mysqli->query($sql);
	if($result)
	{
		while ($row = $result->fetch_object())
		{
			//var_dump($user_arr);
			echo $row->name . "<br />";
		}
		$result->close();
	}
	
	// ----------------------
	
	error_reporting(-1);
	define("FOO", "Defined Something");
	
	class myBasicClass
	{
		const LOCAL_PRODUCT = 2;
		public static $stat1 = 5;
		
		private $vv = 7;
		public $aa = array("a"=>"aa", "bb", "c"=>"cc");
		
		public function __construct()
		{
		}
		
		public function myput($myval)
		{ $this->vv = $myval;}
		
		public function myget()
		{ return $this->vv;}
		
		public function funct1($myval)
		{ return $myval*self::LOCAL_PRODUCT; }
		
		public static function funct2($myval)
		{ return $myval*self::LOCAL_PRODUCT; }
	}
	
	class myClass extends myBasicClass {}

	if(isset($_REQUEST['submit']))
	{
		$req1 = $_REQUEST['n1'];
		
		echo FOO . "<br /><br />";  // define
		
		$oneC = new myClass();
		$oneC->myput(5);
		echo $oneC->myget() . "<br />";
		echo $oneC->aa["c"] . "<br /><br />";
		
		var_dump($oneC->aa);
		
		echo myClass::LOCAL_PRODUCT . "<br />"; // const
		echo myClass::$stat1 . "<br />"; //static var
		echo myClass::funct2(9) . "<br /><br />"; // static funct
	}
	else
	{
?>
    <form method="post">
		<p>number 1: <input type="text" name="n1" /></p>
		<p>number 2: <input type="text" name="n2" /></p>
		<p><input type="submit" name="submit" /></p>
	</form>
<?php } ?>
</body>
</html>