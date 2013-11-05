<?php
class ArticleTypeConfig {
	const AUDIO  	= 1;
	const PICTURE 	= 2;
	const MUSIC 	= 3;
	const FUN		= 4;
	const VEDIO		= 5;
	const ARTICLE	= 6;
	const CARTOON	= 7;
	public static $config = array(
			self::AUDIO 	=> '有声',
			self::PICTURE 	=> '图片',
			self::MUSIC 	=> '音乐',
			self::FUN		=> '趣事',
			self::VEDIO		=> '视频',
			self::ARTICLE	=> '美文',
			self::CARTOON 	=> '动漫'
	);
}