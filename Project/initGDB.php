create table if not exists `TestUsers`(
	`id` int auto_increment not null,
	`username` varchar(30) not null unique,
	`pin` int default 0,
	PRIMARY KEY (`id`)
) CHARACTER SET utf8 COLLATE utf8_general_ci

$stmt = $db->prepare($query);

$r = $stmt->execute();
//just to see the value (should be 1)
echo "<br>" . $r . "<br>";

$user = "Tom";
$pin = 1234;
//DB Insert query
//Bind values
$r = $stmt->execute(...);//hint: something is required here

$select_query = "select * from `TestUsers` where username = :username";

//previous connection/query prep/etc
$result = $stmt->fetch();
echo "<br><pre>" . var_export($result, true) . "</pre><br>";
