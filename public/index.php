<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Easy Docker PHP</title>
</head>
<body>
<section class="hero is-medium is-info is-bold">
	<div class="hero-body">
		<div class="container has-text-centered">
			<h1 class="title">
				Easy Docker PHP
			</h1>
		</div>
	</div>
</section>
<section class="section">
	<div class="container">
		<div class="columns">
			<div class="column">
				<h3 class="title is-3 has-text-centered">Environment</h3>
				<hr>
				<div class="content">
					<ul>
						<li>PHP <?= phpversion(); ?></li>
						<li>
							<?php
                            $_ENV = parse_ini_file('../.env');
							$link = pg_connect("host=db dbname={$_ENV['DB_DATABASE']} user={$_ENV['DB_USERNAME']} password={$_ENV['DB_PASSWORD']}");

							if (!$link) {
								echo "PostgreSQL connection failed";
							} else {
								$result = pg_query($link, "SELECT version()");
								if ($result) {
									$row = pg_fetch_row($result);
									echo "PostgreSQL Server: " . $row[0];
									pg_free_result($result);
								}
								pg_close($link);
							}
							?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
</body>
</html>
