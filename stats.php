<!DOCTYPE html>
<html>
<head>
  <title>Reese Gallagher</title>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  <script src="/js/vendor/modernizr.js"></script>
  <script src="/js/vendor/jquery.js"></script>
  <script src="/js/vendor/fastclick.js"></script>
  <script src="/js/foundation.min.js"></script>
</head>

<body>
<div id="wrap">

	<h1>REDDIT ANALYSIS BOT</h1>
	
	<div id="menu">	
		<ul>
			<li><a href="index.html">HOME</a></li>
			<li><a href="archive.html">ARCHIVE</a></li>
		</ul>
	</div>
		<p id="imp"><i>A reddit bot written in python that scrapes the top 25 posts on the front page of reddit every 30 minutes, 
		gets the *subreddit* they were posted in and keeps a running tally of the number of times that subreddit has been on the front page for the week.<i></p>
		
		print "running since"
		<table>
			<tr>
				<th>ID</th>
				<th>subreddit</th>
				<th>hits</th>
				<th>last date</th>
			</tr>
	<?php
    	$db_connection = pg_connect("host=ec2-23-23-81-221.compute-1.amazonaws.com dbname=degb8ktbt946r1 user=mnokljtfrxnwke password=t9WUHKUToO5Hu6WhCj6boAbb1L");

		#$result = pg_query($db_connection, "SELECT * from stats");
		$result = pg_query($db_connection, "SELECT id, subreddit, count,date FROM stats ORDER BY count DESC;");
		
		while($myrow = pg_fetch_assoc($result)) { 
    		printf ("<tr>
    					<td>%s</td>
    					<td>%s</td>
    					<td>%s</td>
    					<td>%s</td>
					</tr>\r\n", $myrow['id'], htmlspecialchars($myrow['subreddit']), htmlspecialchars($myrow['count']), htmlspecialchars($myrow['date']));} 

	?>
	</table>
<div>

<script>
	$(document).ready()
</script>

</body>

</html>