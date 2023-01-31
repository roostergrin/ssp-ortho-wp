<?
$team = [
	['Steven Woolf', 'President'],
	['Kevin Silver', 'Chief Financial Officer'],
	['Molly McGinnis', 'VP of Clinical Services & Practice Development'],
	['Stacey H.S. Hipsman', 'VP of Human Resources'],
	['First Lastname', 'Title'],
	['First Lastname', 'Title'],
];
?>
<section class="team-list">
	<div class="content">
		<div class="inner-content">
			<ul>
				<? foreach($team as $v): ?>
				<li>
					<a class="block" href="#"><img src="https://via.placeholder.com/315x300" alt="" width="315" height="300" /></a>
					<h2 class="h3"><a class="inherit" href="#"><?= $v[0] ?></h2>
					<div class="team-member-title h3 blue">
						<a class="inherit" href="#"><em><?= $v[1] ?></em></a>
					</div>
				</li>
				<? endforeach ?>
			</ul>
		</div>
	</div>
</section>