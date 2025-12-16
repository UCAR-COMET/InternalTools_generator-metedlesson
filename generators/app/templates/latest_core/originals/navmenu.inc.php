<?php
//Get the PHP Simple HTML DOM Parser. Manual: http://simplehtmldom.sourceforge.net/manual.htm
require_once('simple_html_dom.php');

class Navmenu
{	
	private $html; //The dom of the current print.htm page of interest.
	private $server; //The server we are working on. This is needed since 
	private $path; // The path to the module
	private $toc; //The dom of the current table of contents.
	private $tab; //The tab we are on if any. 
	private $type; //If we want to see interactive or text.
	private $printFiles; //Used by the findPrintVersions() function to return a singleton instance of a list that has the name of all the print files.
	
	private $linkArray = array();//The list of nodes that are leaf nodes, ie. have content.
	private $completeLinkArray = array(); //All nodes even if the are just inner nodes.
	
	private $title;
	
	private $linkPrefix;
	private $linkSuffix;
	
	function __construct($server = NULL, $path = NULL, $tab, $type, $linkPrefix = "navmenu.php", $linkSuffix = "")
	{
		$this->server = $server;
		$this->path = $path;
		$this->tab = $tab;
		$this->type = $type;
		$this->linkPrefix = $linkPrefix;
		$this->linkSuffix = $linkSuffix;
	
		if($path == NULL)
		{
			$printList = $this->findPrintVersions("./");
			
		}else
		{
			$printList = $this->findPrintVersions($_SERVER['DOCUMENT_ROOT'] . $path);
		}
		
		if( count($printList) < 1)
		{
			die("No print versions found in " . $path);
		}
		
		$this->html = new simple_html_dom(); 
		if($server == NULL && $path == NULL)
		{
			$this->html->load_file($printList[$tab - 1]);
		}else
		{
			$this->html->load_file("https://" . $server . $path . $printList[$tab - 1]);	
		}
		
		
		$titleTag = $this->html->find('title', 0);
		$this->title = $titleTag->innertext;
		
		$this->titleTag = $this->html->find('[class=chapter_title]', 0)->innertext;
		
	
		$this->toc = $this->html->find('nav[id=tableofcontents]', 0);
		
		foreach($this->toc->find('a') as $a)
		{
			$link = $a->href;
			$pageNum = substr($link, 6);
			$a->href = $this->linkPrefix . "?tab=" . $tab . "&amp;page=" . $pageNum . "&amp;type=" . $this->type . $this->linkSuffix; 
			if(!strstr($a->class,'innerNode'))
			{
				array_push ($this->linkArray, $pageNum);
			}
			array_push ($this->completeLinkArray, $pageNum);
		}
	}
	
	
	// Get chapter titles for multi-print lessons (table_of_contents.php)
	public function getTabObjects()
	{
		$html = new simple_html_dom(); 
		$printList = $this->findPrintVersions("./");
		if(count($printList) > 1)
		{
			$printArray = array();
			
			foreach($printList as $print)
			{	
				$printObj = new StdClass;
				$html->load_file($print);
				$printObj->title = $html->find('[class=chapter_title]', 0)->innertext;
				$printObj->description = $html->find('[class=chapter_description]', 0)->innertext;
				
				$printArray[] = $printObj;
			}
			
		}
		return $printArray;
	}
	
	
	// Get current chapter title (pageTemplate.php)
	public function getTabTitle()
	{
		return $this->titleTag;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function getPageTitle($page)
	{
		$content = $this->html->find('[id=page_' . $page . ']', 0);
		$h3 = $content->find('h3',0);
		return $h3->innertext;
		
	}
	
	public function getContent($page)
	{
		$content = $this->html->find('[id=page_' . $page . ']', 0);
		
		/*if($this->type == "flash")
		{
			//if there is a div with a class = swf_600_700_some_name then replace that content with the swf  
			$swfDivs = $content->find('[class^=swf_]');
			foreach($swfDivs as $swfDiv)
			{     
				$classes = explode(" ", $swfDiv->class);
				$params = explode("_", $classes[0], 4);
				$width = $params[1];
				$height = $params[2];
				$swf = $params[3];
				$insert = "<div class='swfCenter'><script type='text/javascript'>AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','bgcolor','FFFFFF','width','" . $width . "','height','" . $height . "','src','media/flash/". $swf ."','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','media/flash/". $swf ."','wmode','transparent' );</script></div>";
				$swfDiv->innertext = $insert;
			}
		}*/
		
		//Add the back and next buttons.
		$bnCode = $this->getBackNextCode($page);
		$h2 = $content->find('h2',0);
		//$h2->outertext = $h2->outertext . $bnCode;// add it to the top
		
		$content = $content->innertext . $bnCode;//add it to the bottom.
		return $content;
	}
	
	
	public function getRemoteContent($page)
	{
		//this is the whole page with containing div#page_ or section#page_ and all.
		$content = $this->html->find('[id=page_' . $page . ']', 0);
		
		//get the first header and remove it, sometimes its h2 somtimes an h3, if it something else it won't get removed.;
		$headerTitle = $content->find('h3',0);
		$headerTitle->outertext = '';
		
		$headerTitle = $content->find('h2',0);
		$headerTitle->outertext = '';
		
		//find all the images and change the path to point to the original. 
		$imgs = $content->find('img');
		foreach($imgs as $img)
		{
			$img->src = "https://" . $this->server . $this->path . $img->src;
		}
		
		/*if($this->type == "flash")
		{
			$flashPath = "http://" . $this->server . $this->path;
			
			//if there is a div with a class = swf_600_700_some_name then replace that content with the swf  
			$swfDivs = $content->find('div[class^=swf_]');
			foreach($swfDivs as $swfDiv)
			{     
				$classes = explode(" ", $swfDiv->class);
				$params = explode("_", $classes[0], 4);
				$width = $params[1];
				$height = $params[2];
				$swf = $params[3];
				$insert = "<script type='text/javascript'>AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','bgcolor','FFFFFF','width','" . $width . "','height','" . $height . "','src', '" . $flashPath ."media/flash/". $swf ."','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','" . $flashPath . "media/flash/". $swf ."','wmode','transparent' );</script>";
				$swfDiv->innertext = $insert;
				
			}
		}*/
		
		
		return $content;
	}
	
	
	
	public function getBackNextCode($page)
	{
		
		$next = $previous = $page;
		$size=sizeof($this->linkArray);
		for($i = 0; $i < $size; $i++) 
		{
			if($this->linkArray[$i] == $page)
			{
				if($i < $size - 1)
				{
					$next =  $this->linkArray[$i + 1];
				}
				if($i > 0)
				{
					$previous =  $this->linkArray[$i - 1];
				}
			}
		}	
		
		//No more back pages in this print version.
		if($previous == $page)
		{
			
			//If we are not at the first print version find the last page in the previous print version.
			if($this->tab == 1)
			{
				return '<div class="stage_nav"><ul class="pager"><li class="previous invisible"></li><li class="next"><a href="' . $this->linkPrefix . '?tab=' . $this->tab . '&amp;page=' . $next . "&amp;type=" . $this->type . $this->linkSuffix . '">Next &rarr;</a></li></ul></div>';
			
			}else
			{
				
				$previousPrint = $this->printFiles[$this->tab - 2];
				$html = new simple_html_dom(); 
				$html->load_file($previousPrint);
				$toc = $html->find('[id=tableofcontents]', 0);
		
				foreach($toc->find('a') as $a)
				{
					$link = $a->href;
					$pageNum = substr($link, 6);
				}
				
				return '<div class="stage_nav"><ul class="pager"><li class="previous unit"><a href="' . $this->linkPrefix . '?tab=' . ($this->tab - 1) . "&amp;page=" . $pageNum . "&amp;type=" . $this->type . $this->linkSuffix . '">&larr; Previous Unit</a></li><li class="next"><a href="' . $this->linkPrefix . '?tab=' . $this->tab . '&amp;page=' . $next . "&amp;type=" . $this->type . $this->linkSuffix . '">Next &rarr;</a></li></ul></div>';								 
			}
			
			
		//No more next pages in this print version. If there is another print version get the next page in that one.
		}else if($next == $page)
		{
			//If we are not at the last print version find the first page in the next print version.
			if($this->tab == count($this->printFiles ))
			{
				return '<div class="stage_nav"><ul class="pager"><li class="previous"><a href="' . $this->linkPrefix . '?tab=' . $this->tab . '&amp;page=' . $previous . "&amp;type=" . $this->type . $this->linkSuffix . '">&larr; Previous</a></li><li class="inactive-next"></li></ul></div>';
			}else
			{
				
				$nextPrint = $this->printFiles[$this->tab ];
				$html = new simple_html_dom(); 
				$html->load_file($nextPrint);
				$toc = $html->find('[id=tableofcontents]', 0);
		
				$a = $toc->find('a',0);
				$link = $a->href;
				$pageNum = substr($link, 6);
				
				return '<div class="stage_nav"><ul class="pager"><li class="previous"><a href="' . $this->linkPrefix . '?tab=' . $this->tab  . '&amp;page=' . $previous . "&amp;type=" . $this->type . $this->linkSuffix . '">&larr; Previous</a></li> <li class="next unit"><a href="' . $this->linkPrefix . '?tab=' . ($this->tab + 1) . '&amp;page=' . $pageNum . "&amp;type=" . $this->type . $this->linkSuffix . '">Next Unit &rarr;</a></li></ul></div>';								 
			}
			
			
		}else
		{										 
			return '<div class="stage_nav"><ul class="pager"><li class="previous"><a href="' . $this->linkPrefix . '?tab=' . $this->tab . '&amp;page=' . $previous . "&amp;type=" . $this->type . $this->linkSuffix . '">&larr; Previous</a></li> <li class="next"><a href="' . $this->linkPrefix . '?tab=' . $this->tab . '&amp;page=' . $next . "&amp;type=" . $this->type . $this->linkSuffix . '">Next &rarr;</a></li></ul></div>';								 
		}	
	}
	
	
	public function getPageList()
	{
		return $this->linkArray;
	}
	
	public function getMenu($page)
	{
		$this->closeMenu();
		$node = $this->toc->find('a[href*=' . $page . ']', 0);
		
		$node->class = "menu_here";
		$this->openMenu($node);
		$node = $this->toc->find('ul[id=ul_' . $page . ']', 0);
		if($node != NULL)
		{
			$node->style = "display:block;";
		}
		return $this->toc->innertext;
	}
	
	
	public function getTypeToggleLink($page)
	{
		
		if($this->type == "flash")
		{
			$tt = "Text";
			$t = "text";
		}else
		{
			$tt = "Narrated";
			$t = "flash";
		}
		return "<a class=\"switch\" href=\"" . $this->linkPrefix . "?tab=" . $this->tab . "&amp;page=" . $page . "&amp;type=" . $t . $this->linkSuffix . "\">Switch to <span>". $tt . " Version &rarr;</span></a>";
		
	}
	
	private function closeMenu()
	{
		foreach($this->toc->find('ul') as $ul)
		{
			$ul->style = "display:none;";
		}
		
		foreach($this->toc->find('a') as $a)
		{
			$a->style = null; 
		}
	}
	
	private function openMenu(&$node)
	{
		if($node->tag == 'ul')
		{
			$node->style = "display:block;";
		}
		
		$p = $node->parent();
		if($p != NULL)
		{
			$this->openMenu($p);
		}
	}
	
	//Check to see if the page requested is content or a structure node, if its a structure node then get the next in line.
	public function checkPage($page)
	{
		$node = $this->toc->find('a[href*=' . $page . ']', 0);
		if(isset($node) && strstr($node->class,'innerNode')) 
		{		
			$size=sizeof($this->completeLinkArray);
			for($i = 0; $i < $size; $i++) 
			{
				if($this->completeLinkArray[$i] == $page)
				{
					$next = $this->completeLinkArray[$i + 1];
					return $this->checkPage($next);
				}
			}	
		}
		return $page;
	}	
	
	// Dynamic dropdown unit list (pageTemplate.php)
	public function getTabMenu($tab)
	{
		$html = new simple_html_dom(); 
		$printList = $this->findPrintVersions("./");
		if(count($printList) > 1)
		{
			$tabMenu = "<ul class=\"nav dropdown-menu unit-dropdown-ul\" role=\"menu\" id=\"tab_nav\">\n";
			$count = 1;
			foreach($printList as $print)
			{	
				$html->load_file($print);
				$tabId = $html->find('.chapter_title', 0);
				
				if($tab == $count)
				{
					$tabMenu = $tabMenu . "\t<li class=\"active\"><a href=\"navmenu.php?tab=" . $count . "\">" . "Unit " . $count . " - " . $tabId->innertext . "</a></li>\n";
				}else
				{
					$tabMenu = $tabMenu . "\t<li><a href=\"navmenu.php?tab=" . $count . "\">" . "Unit " . $count . " - " . $tabId->innertext . "</a></li>\n";	
				}
				$count++;
				
			}
			$tabMenu = $tabMenu . "\t</ul>";
			
			return "$tabMenu";
		}else
		{
			return "";
		}
		
	}
	
	public function getPrintLink($tab)
	{	
		if($tab == 1)
		{
			return "print.php";
		}else
		{
			return "print_" . $tab . ".php";
		}
	}
	
	
	/**
	*	Returns an html object array of all the files that have the word "print" ad ".htm" in them 
	*	sorted alphabetically as they come from the directory.
	*	
	*
	* @access private
	* @param string $path the path to the module, normally the current directory.
	* @return array All the simple_html_dom representations of the print versions found.
	*/
	private function findPrintVersions($path)
	{
		if(!$this->printFiles)
		{
			$this->printFiles = array();
			if($dh = opendir($path)) 
			{	
				while(($file = readdir($dh)) !== false)  
				{
					if(is_file($path . $file))
					{
						if(strstr($file, "print"))

						{
							if(strstr($file, ".php" ) || strstr($file, ".htm" ))
							{
								/* catch ._DOT files */
								if(strstr($file, "._")){} else{
									$this->printFiles[] =  $file;
								}
			
							}
						}
					}
				}
			}
			sort($this->printFiles, SORT_STRING);
			return $this->printFiles;
		}else
		{
			return $this->printFiles;
		}
		
	}
}

?>