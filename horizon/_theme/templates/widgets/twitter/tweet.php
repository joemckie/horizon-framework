<?php
global $tweet, $user_mention;
$text = $tweet->text;
$date = $tweet->created_at;
$title_date = date( "F jS, Y H:i:s", strtotime( $date ) );

foreach ( $tweet->entities->user_mentions as $user_mention ) {
	$text = apply_filters( 'horizon_twitter_mention_link', $text, $user_mention );
}
foreach ( $tweet->entities->urls as $url ) {
	$text = apply_filters( 'horizon_twitter_url_link', $text, $url );
}

$date = apply_filters( 'horizon_time_since_date', $date );
?>

<li>
	<p><?php echo $text; ?></p>

	<p><a target="_blank" href="http://www.twitter.com/statuses/<?php echo $tweet->id; ?>"
		  title="<?php echo $title_date; ?>"><?php echo $date; ?></a></p>
</li>