<?php
/*
 * @Author : 孜然
 * @Url : zrv7.com
 * @Qq : 2937978586
 * @User : 404.php
 * @Copyright (c) Cumin All Rights Reserved.
 */

	$tid = 4;
	require ('./header.php');
?>

<div class="main">
<main>
	<svg viewBox="0 -40 600 320">
		<symbol id="s-text">
			<text text-anchor="middle" x="50%" y="40%" class="text--line">404</text>
			<text text-anchor="middle" x="50%" y="60%" class="text--line2">Not Found</text>
		</symbol>
		<g class="g-ants">
    		<use xlink:href="#s-text" class="text-copy"></use>     
    		<use xlink:href="#s-text" class="text-copy"></use>     
    		<use xlink:href="#s-text" class="text-copy"></use>     
    		<use xlink:href="#s-text" class="text-copy"></use>     
    		<use xlink:href="#s-text" class="text-copy"></use>     
		</g>
	</svg>
</main>
</div>

<?php
	require ('./footer.php');
?>