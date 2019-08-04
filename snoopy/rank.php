<?php
	// echo "a";
	require($_SERVER['DOCUMENT_ROOT'].'/snoopy/Snoopy.class.php');
	$snoopy = new Snoopy;
	$text = "";
		$snoopy->fetch("https://store.steampowered.com/stats/Steam-Game-and-Player-Statistics?l=koreana");
		$txt = $snoopy->results;
		$rex="/\<a class=\"gameLink.+\"\>(.*)\<\/a\>/";
		// $rex1="/\<span class=\"currentServers.+\"\>(.*)\<\/span\>/";
		$rex1 = '#<span class="currentServers">(.+?)</span>#';

		// $rex="|<tr class=\"player_count_row\"><td>/\<a class=\"gameLink.+\"\>(.*)\<\/a\>/</td></td>|";
		preg_match_all($rex,$txt,$o);
		preg_match_all($rex1,$txt,$o1);


		echo "<div class='r_top_wrap'>";
		echo "<h3 style='color:white; text-align:center;'>게임 랭킹</h3>";
		echo "<table class='rank_table'>";
				for($i = 0; $i <= 9; $i++)
				{
					$num = $i +1;
					echo "<tr class='rank_tr'>";
					echo "<td class='rank_td_num'><p>".$num."</p></td>";
					echo "<td class='rank_td_body'>".$o[0][$i]."</td>";
					echo "</tr>";
				}
		echo "</table>";
		echo "<div>";
?>